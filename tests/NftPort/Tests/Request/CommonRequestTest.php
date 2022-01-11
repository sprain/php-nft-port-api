<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils as GuzzleUtils;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Response\ErrorResponse;
use Sprain\NftPort\Response\ResponseInterface;

abstract class CommonRequestTest extends TestCase
{
    private bool $successful;
    private ?string $successfulResponseClass;

    abstract protected function getRequest(): Request;

    public function doTestErrorResponse(): void
    {
        $this->successful = false;
        $this->successfulResponseClass = null;
        $response = $this->executeRequest();

        $this->assertInstanceOf(ErrorResponse::class, $response);
    }

    public function doTestSuccessfulResponse(string $responseClass): void
    {
        $this->successful = true;
        $this->successfulResponseClass = $responseClass;
        $response = $this->executeRequest();

        $this->assertInstanceOf($responseClass, $response);
    }

    private function executeRequest(): ResponseInterface
    {
        $request = $this->getRequest();
        $request->setClient(
            $this->getClientMock($request->getHttpMethod())
        );

        return $request->execute();
    }

    private function getClientMock(string $methodName): MockObject
    {
        $client = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->onlyMethods([$methodName])
            ->getMock();

        $client->expects($this->once())
            ->method($methodName)
            ->willReturn($this->getResponseMock($methodName));

        return $client;
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

        $response
            ->method('getStatusCode')
            ->willReturn($this->successful ? 200 : 422);

        if ($this->successful) {
            $content = $this->getFakedApiResponse($this->successfulResponseClass);
        } else {
            $content = $this->getFakedApiResponse(ErrorResponse::class);
        }

        $response
            ->method('getBody')
            ->willReturn(GuzzleUtils::streamFor($content));

        return $response;
    }

    private function getFakedApiResponse(string $class): string
    {
        $response = new $class();

        // simplified serizalizing
        return json_encode($response);
    }
}
