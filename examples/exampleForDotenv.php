<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Studoo\Api\EcoleDirecte\Client;
use Symfony\Component\Dotenv\Dotenv;

/**
 * Mise en place de l'environnement de développement via DotEnv
 * via le fichier .env à la racine du projet
 * Renseigner les variables CLIENT_ID, CLIENT_SECRET
 */

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

$client = new Client([
    "client_id" => $_ENV["CLIENT_ID"],
    "client_secret" => $_ENV["CLIENT_SECRET"],
]);
echo "<h1>API ECOLE DIRECTE via DotEnv</h1>";
// Recupération du token et profile
$etudiant = $client->fetchAccessToken();
echo "Token: {$etudiant->getToken()} <br>";
echo "Email: {$etudiant->getEmail()} <br>";
echo "Nom: {$etudiant->getNom()} <br>";
echo "Prenom: {$etudiant->getPrenom()} <br>";
echo "Identifiant: {$etudiant->getIdentifiant()} <br>";