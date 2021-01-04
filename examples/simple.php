<?php

require '../vendor/autoload.php';

$credentials = \Gladyshev\Yandex\Direct\ClientCredentials::buildForSandbox(
    getenv('_TOKEN_'),
    getenv('_MASTER_TOKEN_')
);

$client = new \Gladyshev\Yandex\Direct\Client(
    $credentials,
    new GuzzleHttp\Client()
);

$resp = $client->campaigns->get(
    ['Types' => ['TEXT_CAMPAIGN']],
    ['Name', 'Funds', 'ClientInfo']
);

print_r($resp);
