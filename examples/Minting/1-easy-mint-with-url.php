<?php declare(strict_types=1);

use Sprain\NftPort\Data\Blockchain;
use Sprain\NftPort\Request\Minting\EasyMintRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Easy Minting with url
// https://docs.nftport.xyz/docs/nftport/b3A6MjE2NjM5MDM-easy-minting-w-url

$response = (new EasyMintRequest(
    $apiKey,
    Blockchain::Polygon->name(),
    'My NFT',
    'Some NFT',
    'https://images.unsplash.com/photo-1524758631624-e2822e304c36',
    $ethAddress
))->execute();

print_r($response);
