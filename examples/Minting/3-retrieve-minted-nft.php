<?php declare(strict_types=1);

use Sprain\NftPort\Data\Blockchain;
use Sprain\NftPort\Request\Minting\RetrieveMintedNftRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Retrieve a minted NFT
// https://docs.nftport.xyz/docs/nftport/b3A6MjE2NjM5MDU-retrieve-a-minted-nft

$response = (new RetrieveMintedNftRequest(
    $apiKey,
    '0x1a3dfdec04379f3aec147afcbc4548e91ce5e159f7d7aa5d22218097ecaff09c',  // See examples/Contracts/2-customizable-mint.php
    Blockchain::Polygon->name()
))->execute();

print_r($response);
