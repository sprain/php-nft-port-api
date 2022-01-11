<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Contracts;

use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Tests\Request\CommonRequestTest;
use Sprain\NftPort\Data\Blockchain;
use Sprain\NftPort\Request\Contracts\DeployContractRequest;
use Sprain\NftPort\Response\Contracts\DeployContractResponse;

class DeployContractRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            DeployContractResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new DeployContractRequest(
            'apiKey',
            Blockchain::Polygon->name(),
            'My NFT collection',
            'MYNFT',
            'someWalletAdress'
        );
    }
}
