<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Storage;

use JMS\Serializer\Annotation\Exclude;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Request\FileUploadRequestInterface;
use Sprain\NftPort\Response\Storage\UploadFileResponse;

class UploadFileRequest extends Request implements FileUploadRequestInterface
{
    use RequestCommonsTrait;

    public const API_PATH = '/files';
    public const RESPONSE_CLASS = UploadFileResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_POST;

    public function __construct(
        #[Exclude]
        private string $apiKey,
        private string $pathToFile
    ) {
        parent::__construct($apiKey);
    }

    public function getFormFieldName(): string
    {
        return 'file';
    }

    public function getFileName(): string
    {
        return basename($this->pathToFile);
    }

    public function getFileResource()
    {
        return fopen($this->pathToFile, 'rb');
    }
}
