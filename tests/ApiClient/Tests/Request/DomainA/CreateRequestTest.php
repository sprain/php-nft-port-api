<?php declare(strict_types=1);

namespace Sprain\ApiClient\Tests\Request\DomainA;

use Sprain\ApiClient\Request\DomainA\CreateRequest;
use Sprain\ApiClient\Response\DomainA\CreateResponse;
use Sprain\ApiClient\Tests\Request\CommonRequestTest;

class CreateRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse(CreateRequest::class);
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            CreateRequest::class,
            CreateResponse::class
        );
    }
}
