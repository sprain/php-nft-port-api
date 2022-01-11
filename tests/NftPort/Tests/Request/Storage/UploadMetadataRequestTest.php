<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Contracts;

use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\Storage\UploadMetadataRequest;
use Sprain\NftPort\Response\Storage\UploadMetadataResponse;
use Sprain\NftPort\Tests\Request\CommonRequestTest;

class UploadMetadataRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            UploadMetadataResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new UploadMetadataRequest(
            'apiKey',
            'someName',
            'someDescription',
            'someFileUrl',
            null,
            null,
            ['some' => 'customFields']
        );
    }
}
