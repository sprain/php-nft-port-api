<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Ownership;

use Sprain\NftPort\Request\Minting\RetrieveMintedNftRequest;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Response\Minting\RetrieveMintedNftResponse;
use Sprain\NftPort\Tests\Request\CommonRequestTest;
use Sprain\NftPort\Data\Blockchain;

class RetrieveMintedNftRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            RetrieveMintedNftResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new RetrieveMintedNftRequest(
            'apiKey',
            'someTransactionHash',
            Blockchain::Polygon->name()
        );
    }
}
