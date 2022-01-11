<?php declare(strict_types=1);

namespace Sprain\NftPort\Tests\Request\Contracts;

use Sprain\NftPort\Request\Request;
use Sprain\NftPort\Request\Storage\UploadFileRequest;
use Sprain\NftPort\Response\Storage\UploadFileResponse;
use Sprain\NftPort\Tests\Request\CommonRequestTest;

class UploadFileRequestTest extends CommonRequestTest
{
    public function testErrorResponse(): void
    {
        $this->doTestErrorResponse();
    }

    public function testSuccessfulResponse(): void
    {
        $this->doTestSuccessfulResponse(
            UploadFileResponse::class
        );
    }

    protected function getRequest(): Request
    {
        return new UploadFileRequest(
            'apiKey',
            __DIR__ . '/../../../../../examples/testimage.jpg'
        );
    }
}
