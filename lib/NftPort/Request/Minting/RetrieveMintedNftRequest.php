<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Minting;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Request\IdRequestInterface;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Response\Minting\RetrieveMintedNftResponse;

class RetrieveMintedNftRequest extends Request implements IdRequestInterface
{
    use RequestCommonsTrait;

    public const API_PATH = '/mints/{id}';
    public const RESPONSE_CLASS = RetrieveMintedNftResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_GET;

    public function __construct(
        #[Exclude]
        protected string $apiKey,
        private string $id,
        #[SerializedName('chain')]
        private string $chain,
    ) {
        parent::__construct($apiKey);
    }
}
