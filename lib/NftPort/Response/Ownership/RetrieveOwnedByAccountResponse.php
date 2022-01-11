<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response\Ownership;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Sprain\NftPort\Response\ResponseInterface;

class RetrieveOwnedByAccountResponse implements ResponseInterface
{
    #[SerializedName('response')]
    public ?string $response = null;

    #[SerializedName('nfts')]
    #[Type('array')]
    public ?array $nfts = null;

    #[SerializedName('chain')]
    public ?string $chain = null;

    #[SerializedName('total')]
    public ?int $total = null;

    #[SerializedName('continuation')]
    public ?string $continuation = null;

    #[SerializedName('error')]
    public ?string $error = null;
}
