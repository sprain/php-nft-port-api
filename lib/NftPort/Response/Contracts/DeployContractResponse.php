<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Contracts;

use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Response\ResponseInterface;

class DeployContractResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public string $response;

    #[SerializedName('chain')]
    public ?string $chain;

    #[SerializedName('transaction_hash')]
    public ?string $transactionHash;

    #[SerializedName('transaction_external_url')]
    public ?string $transactionExternalUrl;

    #[SerializedName('owner_address')]
    public ?string $ownerAddress;

    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('symbol')]
    public ?string $symbol;

    #[SerializedName('error')]
    public ?string $error;
}
