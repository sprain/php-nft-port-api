<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Contracts;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Response\Contracts\DeployContractResponse;

class DeployContractRequest extends Request
{
    use RequestCommonsTrait;

    public const API_PATH = '/contracts';
    public const RESPONSE_CLASS = DeployContractResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_POST;

    public function __construct(
        #[Exclude]
        private string $apiKey,
        #[SerializedName('chain')]
        private string $chain,
        #[SerializedName('name')]
        private string $name,
        #[SerializedName('symbol')]
        private string $symbol,
        #[SerializedName('owner_address')]
        private string $owner_address,
        #[SerializedName('metadata_updatable')]
        private ?string $metadataUpdatable = null,
        #[SerializedName('base_uri')]
        private ?string $baseUri = null
    ) {
        parent::__construct($apiKey);
    }
}
