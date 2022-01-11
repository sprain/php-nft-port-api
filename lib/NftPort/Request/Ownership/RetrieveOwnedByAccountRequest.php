<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request\Ownership;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Request\IdRequestInterface;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\RequestCommonsTrait;
use Sprain\NftPort\Response\Ownership\RetrieveOwnedByAccountResponse;

class RetrieveOwnedByAccountRequest extends Request implements IdRequestInterface
{
    use RequestCommonsTrait;

    public const API_PATH = '/accounts/{id}';
    public const RESPONSE_CLASS = RetrieveOwnedByAccountResponse::class;
    public const HTTP_METHOD = self::HTTP_METHOD_GET;

    public function __construct(
        #[Exclude]
        protected string $apiKey,
        private string $id,
        #[SerializedName('chain')]
        private string $chain,
        #[SerializedName('continuation')]
        private ?string $continuation = null,
        #[SerializedName('include')]
        private ?string $include = null,
        #[SerializedName('page_number')]
        private ?string $pageNumber = null,
        #[SerializedName('page_size')]
        private ?string $pageSize = null,
    ) {
        parent::__construct($apiKey);
    }

    public function getId(): string
    {
        return $this->id;
    }
}
