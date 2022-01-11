<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Minting;

use JMS\Serializer\Annotation\SerializedName;
use Sprain\NftPort\Response\ResponseInterface;

class CustomizableMintResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public ?string $response = null;

    #[SerializedName('chain')]
    public ?string $chain;

    #[SerializedName('contract_address')]
    public ?string $contractAddress;

    #[SerializedName('transaction_hash')]
    public ?string $transactionHash;

    #[SerializedName('transaction_external_url')]
    public ?string $transactionExternalUrl;

    #[SerializedName('metadata_uri')]
    public ?string $metaDataUri;

    #[SerializedName('mint_to_address')]
    public ?string $mintToAddress;

    #[SerializedName('error')]
    public ?string $error;
}
