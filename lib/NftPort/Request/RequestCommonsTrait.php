<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request;

trait RequestCommonsTrait
{
    public function getApiPath(): string
    {
        $apiPath = self::API_PATH;

        if ($this instanceof IdRequestInterface) {
            $apiPath = str_replace('{id}', $this->id, $apiPath);
        }

        return $apiPath;
    }

    public function getResponseClass(): string
    {
        return self::RESPONSE_CLASS;
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD;
    }
}
