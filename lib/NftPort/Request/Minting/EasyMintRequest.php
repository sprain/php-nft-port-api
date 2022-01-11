<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Minting;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Response\Minting\EasyMintResponse;

class EasyMintRequest extends Request
{
    use RequestCommonsTrait;

    public const API_PATH = '/mints/easy/urls';
    public const RESPONSE_CLASS = EasyMintResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_POST;

    public function __construct(
        #[Exclude]
        private string $apiKey,
        #[SerializedName('chain')]
        private string $chain,
        #[SerializedName('name')]
        private string $name,
        #[SerializedName('description')]
        private string $description,
        #[SerializedName('file_url')]
        private string $fileUrl,
        #[SerializedName('mint_to_address')]
        private string $mintToAddress
    ) {
        parent::__construct($apiKey);
    }
}
