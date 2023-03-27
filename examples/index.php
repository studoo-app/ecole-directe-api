<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Studoo\Api\EcoleDirecte\Client;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

$client = new Client([
    "client_id" => $_ENV["CLIENT_ID"],
    "client_secret" => $_ENV["CLIENT_SECRET"],
]);

echo "Token: {$client->fetchAccessToken()->getToken()} <br>";
echo "ID: {} <br>";
var_dump($client->getVieScolaire("7006"));

