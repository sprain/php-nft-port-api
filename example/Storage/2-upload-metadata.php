<?php declare(strict_types=1);

use Sprain\NftPort\Request\Storage\UploadMetadataRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Upload metadata to IPFS
// https://docs.nftport.xyz/docs/nftport/b3A6MjE0MDYzNzc-upload-metadata-to-ipfs

$response = (new UploadMetadataRequest(
    $apiKey,
   'Test NFT',
    'This is some test NFT, going to the eternal storage of the blockchain',
    'https://ipfs.io/ipfs/bafkreif4ncyi6ee7ntxoxn6qkkvzlr7frd5p6m366kih5lon6ymski2gxu', // See example/Storage/1-upload-file.php
    null,
    null,
    [
        'welcome' => 'Hello World!',
        'awesome' => 'exorbitant'
    ]
))->execute();

print_r($response);
