<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Minting;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Sprain\NftPort\Response\ResponseInterface;

class RetrieveMintedNftResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public ?string $response = null;

    #[SerializedName('chain')]
    public ?string $chain = null;

    #[SerializedName('contract_address')]
    public ?int $contractAddress = null;

    #[SerializedName('token_id')]
    public ?string $tokenId = null;

    #[SerializedName('error')]
    public ?string $error = null;
}
