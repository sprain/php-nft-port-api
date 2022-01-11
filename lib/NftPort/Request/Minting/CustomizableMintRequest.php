<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Minting;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Response\Minting\CustomizableMintResponse;

class CustomizableMintRequest extends Request
{
    use RequestCommonsTrait;

    public const API_PATH = '/mints/customizable';
    public const RESPONSE_CLASS = CustomizableMintResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_POST;

    public function __construct(
        #[Exclude]
        protected string $apiKey,
        #[SerializedName('chain')]
        private string $chain,
        #[SerializedName('contract_address')]
        private string $contractAddress,
        #[SerializedName('metadata_uri')]
        private string $metadataUri,
        #[SerializedName('mint_to_address')]
        private string $mintToAddress,
        #[SerializedName('token_id')]
        private ?string $tokenId = null
    ) {
        parent::__construct($apiKey);
    }
}
