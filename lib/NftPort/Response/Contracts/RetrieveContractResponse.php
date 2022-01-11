<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Contracts;

use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Response\ResponseInterface;

class RetrieveContractResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public string $response;

    #[SerializedName('chain')]
    public ?string $chain;

    #[SerializedName('transaction_hash')]
    public ?string $transactionHash;

    #[SerializedName('contract_address')]
    public ?string $contractAddress;

    #[SerializedName('error')]
    public ?string $error;
}
