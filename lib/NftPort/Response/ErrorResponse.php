<?php

declare(strict_types=1);

namespace Sprain\NftPort\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class ErrorResponse implements ResponseInterface
{
    #[SerializedName('error')]
    public string $error;

    #[SerializedName('detail')]
    #[Type('array')]
    public array $detail;
}
