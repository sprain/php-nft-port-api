<?php

declare(strict_types=1);

namespace Sprain\NftPort\Request;

interface FileUploadRequestInterface
{
    public function getFormFieldName(): string;

    public function getFileName(): string;

    public function getFileResource();
}
