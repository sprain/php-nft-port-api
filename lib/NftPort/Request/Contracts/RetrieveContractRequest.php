<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Contracts;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Request\IdRequestInterface;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Response\Contracts\RetrieveContractResponse;

class RetrieveContractRequest extends Request implements IdRequestInterface
{
    use RequestCommonsTrait;

    public const API_PATH = '/contracts/{id}';
    public const RESPONSE_CLASS = RetrieveContractResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_GET;

    public function __construct(
        #[Exclude]
        private string $apiKey,
        #[Exclude]
        protected string $id,
        #[SerializedName('chain')]
        private string $chain
    ) {
        parent::__construct($apiKey);
    }
}
