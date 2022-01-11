<?php declare(strict_types=1);

namespace Sprain\ApiClient\Tests\Request;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sprain\ApiClient\Request\Request;
use Sprain\ApiClient\Response\ErrorResponse;
use Sprain\ApiClient\Response\ResponseInterface;

abstract class CommonRequestTest extends TestCase
{
    private bool $successful;
    private ?string $successfulResponseClass;

    public function doTestErrorResponse(string $requestClass): void
    {
        $this->successful = false;
        $this->successfulResponseClass = null;
        $response = $this->executeRequest($requestClass);

        $this->assertInstanceOf(ErrorResponse::class, $response);
    }

    public function doTestSuccessfulResponse(string $requestClass, string $responseClass): void
    {
        $this->successful = true;
        $this->successfulResponseClass = $responseClass;
        $response = $this->executeRequest($requestClass);

        $this->assertInstanceOf($responseClass, $response);
    }

    private function executeRequest(string $requestClass): ResponseInterface
    {
        $initializer = new $requestClass(
            'apiKey',
            'apiSecret',
            false,
            $this->getClientMock($requestClass::HTTP_METHOD)
        );

        return $initializer->execute();
    }

    private function getClientMock(string $methodName): MockObject
    {
        $browser = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods([$methodName])
            ->getMock();

        $browser->expects($this->once())
            ->method($methodName)
            ->willReturn($this->getResponseMock($methodName));

        return $browser;
    }

    private function getResponseMock(string $methodName): MockObject
    {
        $response = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->onlyMethods([
                'getStatusCode',
                'getBody'
            ])
            ->getMock();

        $expectedResponseCode = 200;
        if (Request::HTTP_METHOD_POST === $methodName) {
            $expectedResponseCode = 201;
        }
        if (Request::HTTP_METHOD_DELETE === $methodName) {
            $expectedResponseCode = 204;
        }

        $response
            ->method('getStatusCode')
            ->willReturn($this->successful ? $expectedResponseCode : 404);

        if ($this->successful) {
            $content = $this->getFakedApiResponse($this->successfulResponseClass);
        } else {
            $content = $this->getFakedApiResponse(ErrorResponse::class);
        }

        $response
            ->method('getBody')
            ->willReturn($content);

        return $response;
    }

    private function getFakedApiResponse(string $class): string
    {
        AnnotationRegistry::registerLoader('class_exists');
        $serializer = SerializerBuilder::create()->build();

        $response = new $class();

        return $serializer->serialize($response, 'json');
    }
}
