<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Storage;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Response\Storage\UploadMetadataResponse;

class UploadMetadataRequest extends Request
{
    use RequestCommonsTrait;

    public const API_PATH = '/metadata';
    public const RESPONSE_CLASS = UploadMetadataResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_POST;

    public function __construct(
        #[Exclude]
        private string $apiKey,
        #[SerializedName('name')]
        private string $name,
        #[SerializedName('description')]
        private string $description,
        #[SerializedName('file_url')]
        private string $fileUrl,
        #[SerializedName('external_url')]
        private ?string $externalUrl = null,
        #[SerializedName('animation_url')]
        private ?string $animationUrl = null,
        #[SerializedName('custom_fields')]
        private ?array $customFields = null
    ) {
        parent::__construct($apiKey);
    }
}
