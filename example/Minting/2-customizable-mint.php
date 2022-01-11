<?php declare(strict_types=1);

use Sprain\NftPort\Data\Blockchain;
use Sprain\NftPort\Request\Minting\CustomizableMintRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Customizable minting
// https://docs.nftport.xyz/docs/nftport/b3A6MjE2NjM5MDI-customizable-minting

$response = (new CustomizableMintRequest(
    $apiKey,
    Blockchain::Polygon->name(),
    $contractAddress, // See example/Contracts/2-retrieve-contract.php
    'ipfs://bafkreidhf4ueqwsrjrgc27j4afbtzmqojelk2rdmlrhxsdnmrbkjxzgfum', // See example/Storage/2-upload-metadata.php
    $ethAddress
))->execute();

print_r($response);
