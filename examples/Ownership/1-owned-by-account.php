<?php declare(strict_types=1);

use Sprain\NftPort\Data\Blockchain;
use Sprain\NftPort\Request\Ownership\RetrieveOwnedByAccountRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Retrieve owned by account
// https://docs.nftport.xyz/docs/nftport/b3A6MjE0MDYzNzM-retrieve-nf-ts-owned-by-an-account

$response = (new RetrieveOwnedByAccountRequest(
    $apiKey,
    $ethAddress,
    Blockchain::Polygon->name(),
))->execute();

print_r($response);
