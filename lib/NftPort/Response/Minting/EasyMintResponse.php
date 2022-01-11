<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Minting;

use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Response\ResponseInterface;

class EasyMintResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public ?string $response = null;

    #[SerializedName('chain')]
    public ?string $chain = null;

    #[SerializedName('contract_address')]
    public ?string $contractAddress = null;

    #[SerializedName('transaction_hash')]
    public ?string $transactionHash = null;

    #[SerializedName('transaction_external_url')]
    public ?string $transactionExternalUrl = null;

    #[SerializedName('mint_to_address')]
    public ?string $mintToAddress = null;

    #[SerializedName('name')]
    public ?string $name = null;

    #[SerializedName('description')]
    public ?string $description = null;

    #[SerializedName('error')]
    public ?string $error = null;
}
