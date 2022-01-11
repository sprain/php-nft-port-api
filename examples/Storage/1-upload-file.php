<?php declare(strict_types=1);

use Sprain\NftPort\Request\Storage\UploadFileRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Upload file to IPFS
// https://docs.nftport.xyz/docs/nftport/b3A6MjE0MDYzNzY-upload-a-file-to-ipfs

$response = (new UploadFileRequest(
    $apiKey,
    __DIR__ . '/../testimage.jpg'
))->execute();

print_r($response);
