<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Storage;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Sprain\NftPort\Response\ResponseInterface;

class UploadMetadataResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public string $response;

    #[SerializedName('metadata_uri')]
    public ?string $metadataUri;

    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('file_url')]
    public ?string $fileUrl;

    #[SerializedName('external_url')]
    public ?string $externalUrl;

    #[SerializedName('animation_url')]
    public ?float $animationUrl;

    #[SerializedName('custom_fields')]
    #[Type('array')]
    public ?array $customFields;

    #[SerializedName('error')]
    public ?string $error;
}
