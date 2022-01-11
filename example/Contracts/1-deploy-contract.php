<?php declare(strict_types=1);

use Sprain\NftPort\Data\Blockchain;
use Sprain\NftPort\Request\Contracts\DeployContractRequest;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../credentials.php';


// Deploy an nft contract
// https://docs.nftport.xyz/docs/nftport/b3A6MjE0MDYzNzU-deploy-an-nft-contract

$response = (new DeployContractRequest(
    Blockchain::Polygon->name(),
    'polygon',
    'My NFT collection',
    'MYNFT',
    $ethAddress
))->execute();

print_r($response);
