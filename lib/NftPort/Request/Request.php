<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use Sprain\NftPort\Response\ResponseInterface;
use Sprain\NftPort\Response\ErrorResponse;

abstract class Request
{
    public const HTTP_METHOD_GET = 'get';
    public const HTTP_METHOD_POST = 'post';
    public const HTTP_METHOD_PATCH = 'patch';
    public const HTTP_METHOD_PUT = 'put';

    private const ROOT_URL = 'https://api.nftport.xyz/v0';
    private const ERROR_RESPONSE_CLASS = ErrorResponse::class;

    abstract public function getApiPath(): string;
    abstract public function getResponseClass(): string;
    abstract public function getHttpMethod(): string;

    #[Exclude]
    private ?Client $client = null;

    public function __construct(
        #[Exclude]
        private string $apiKey
    ) {
    }

    public function execute(): ResponseInterface
    {
        $response = $this->getHttpResponse();
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 400 && $statusCode < 500) {
            return $this->getSerializer()->deserialize(
                (string) $response->getBody(),
                self::ERROR_RESPONSE_CLASS,
                'json'
            );
        }

        $body = (string) $response->getBody();

        if ('' === $body) {
            $class = $this->getResponseClass();
            return new $class();
        }

        return $this->getSerializer()->deserialize(
            (string) $response->getBody(),
            $this->getResponseClass(),
            'json'
        );
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    private function getHttpResponse(): HttpResponseInterface
    {
        try {
            return match ($this->getHttpMethod()) {
                self::HTTP_METHOD_GET => $this->get(),
                self::HTTP_METHOD_PATCH => $this->patch(),
                self::HTTP_METHOD_PUT => $this->put(),
                self::HTTP_METHOD_POST => $this->post(),
            };
        } catch (\Exception $e) {
            if ($e instanceof ClientException) {
                return $e->getResponse();
            }

            throw $e;
        }
    }

    private function get(): HttpResponseInterface
    {
        $queryParameters = json_decode($this->getContent(), true);

        return $this->getClient()->get(
            $this->getUrl($queryParameters),
            [
                'headers' => $this->getHeaders(),
            ]
        );
    }

    private function patch(): HttpResponseInterface
    {
        return $this->getClient()->patch(
            $this->getUrl(),
            [
                'headers' => $this->getHeaders(),
                'body' => $this->getContent()
            ]
        );
    }

    private function put(): HttpResponseInterface
    {
        return $this->getClient()->put(
            $this->getUrl(),
            [
                'headers' => $this->getHeaders(),
                'body' => $this->getContent()
            ]
        );
    }

    private function post(): HttpResponseInterface
    {
        if ($this instanceof FileUploadRequestInterface) {
            return $this->upload();
        }

        return $this->getClient()->post(
            $this->getUrl(),
            [
                'headers' => $this->getHeaders(),
                'body' => $this->getContent()
            ]
        );
    }

    private function upload(): HttpResponseInterface
    {
        return $this->getClient()->post(
            $this->getUrl(),
            [
                'headers' => $this->getMutipartHeaders(),
                'multipart' => [[
                    'name' => $this->getFormFieldName(),
                    'filename' => $this->getFileName(),
                    'contents' => $this->getFileResource()
                ]]
            ]
        );
    }

    private function getApiKey(): string
    {
        return $this->apiKey;
    }

    private function getUrl(array $queryParameters = []): string
    {
        $url = self::ROOT_URL . $this->getApiPath();

        if ($queryParameters) {
            $queryString = http_build_query($queryParameters);
            $url .= '?' . $queryString;
        }

        return $url;
    }

    private function getHeaders(): array
    {
        return [
            'Content-Type'  => 'application/json; charset=utf-8',
            'Accept'        => 'application/json',
            'Authorization' => $this->getApiKey()
        ];
    }

    private function getMutipartHeaders(): array
    {
        return [
            'Accept'        => 'application/json',
            'Authorization' => $this->getApiKey()
        ];
    }

    private function getContent(): string
    {
        return $this->getSerializer()->serialize($this, 'json');
    }

    private function getSerializer(): SerializerInterface
    {
        return SerializerBuilder::create()->build();
    }

    private function getClient(): Client
    {
        return $this->client ?? new Client();
    }
}
