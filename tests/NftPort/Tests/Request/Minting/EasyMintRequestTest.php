<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Contracts;

use Sprain\NftPort\Request\Minting\EasyMintRequest;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Response\Minting\EasyMintResponse;
use Sprain\NftPort\Tests\Request\CommonRequestTest;
use Sprain\NftPort\Data\Blockchain;

class EasyMintRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            EasyMintResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new EasyMintRequest(
            'apiKey',
            Blockchain::Polygon->name(),
            'someName',
            'someDescription',
            'someFileUrl',
            'someWalletAddress'
        );
    }
}
