<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Storage;

use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Response\ResponseInterface;

class UploadFileResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public ?string $response = null;

    #[SerializedName('ipfs_url')]
    public ?string $ipfsUrl;

    #[SerializedName('file_name')]
    public ?string $fileName;

    #[SerializedName('content_type')]
    public ?string $contentType;

    #[SerializedName('file_size')]
    public ?int $fileSize;

    #[SerializedName('file_size_mb')]
    public ?float $fileSizeMb;

    #[SerializedName('error')]
    public ?string $error;
}
