<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Contracts;

use Sprain\NftPort\Request\Minting\CustomizableMintRequest;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Response\Minting\CustomizableMintResponse;
use Sprain\NftPort\Tests\Request\CommonRequestTest;
use Sprain\NftPort\Data\Blockchain;

class CustomizableMintRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            CustomizableMintResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new CustomizableMintRequest(
            'apiKey',
            Blockchain::Polygon->name(),
            'someContractAddress',
            'someMetadataUri',
            'someWalletAdress'
        );
    }
}
