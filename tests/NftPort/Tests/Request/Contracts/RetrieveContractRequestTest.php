<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Contracts;

use Sprain\NftPort\Request\Contracts\RetrieveContractRequest;
use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Response\Contracts\RetrieveContractResponse;
use Sprain\NftPort\Tests\Request\CommonRequestTest;
use Sprain\NftPort\Data\Blockchain;

class RetrieveContractRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            RetrieveContractResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new RetrieveContractRequest(
            'apiKey',
            'someTransactionHash',
            Blockchain::Polygon->name()
        );
    }
}
