<?php declare(strict_types=1);

use Sprain\NftPort\Data\Blockchain;
use Sprain\NftPort\Request\Contracts\RetrieveContractRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Retrieve an nft contract
// https://docs.nftport.xyz/docs/nftport/b3A6MjE0MDYzNzU-deploy-an-nft-contract

$response = (new RetrieveContractRequest(
    $apiKey,
    $contractTransactionHash, // see examples/Contracts/1-deploy-contract.php
    Blockchain::Polygon->name(),
))->execute();

print_r($response);
