<?php

declare(strict_types=1);

namespace Sprain\NftPort\Data;

enum Blockchain
{
    case Polygon;
    case Rinkeby;

    public function name(): string
    {
        return match ($this) {
            self::Polygon => 'polygon',
            self::Rinkeby => 'rinkeby'
        };
    }
}
