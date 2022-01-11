<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Contracts;

use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Response\ResponseInterface;

class DeployContractResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public ?string $response = null;

    #[SerializedName('chain')]
    public ?string $chain = null;

    #[SerializedName('transaction_hash')]
    public ?string $transactionHash = null;

    #[SerializedName('transaction_external_url')]
    public ?string $transactionExternalUrl = null;

    #[SerializedName('owner_address')]
    public ?string $ownerAddress = null;

    #[SerializedName('name')]
    public ?string $name = null;

    #[SerializedName('symbol')]
    public ?string $symbol = null;

    #[SerializedName('error')]
    public ?string $error = null;
}
