<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Ownership;

use Sprain\NftPort\Request\Minting\CustomizableMintRequest;
use Sprain\NftPort\Request\Ownership\RetrieveOwnedByAccountRequest;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Response\Minting\CustomizableMintResponse;
use Sprain\NftPort\Response\Ownership\RetrieveOwnedByAccountResponse;
use Sprain\NftPort\Tests\Request\CommonRequestTest;
use Sprain\NftPort\Data\Blockchain;

class RetrieveOwnedByAccountRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            RetrieveOwnedByAccountResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new RetrieveOwnedByAccountRequest(
            'apiKey',
            'someWalletAddress',
            Blockchain::Polygon->name()
        );
    }
}
