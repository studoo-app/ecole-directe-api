<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Studoo\Api\EcoleDirecte\Client;
use Symfony\Component\Dotenv\Dotenv;

/**
 * Mise en place de l'environnement de développement via DotEnv
 * via le fichier .env à la racine du projet
 * Renseigner les variables ENV
 * Pour faire fonctionner le Docker, il faut renseigner ENV=test
 * Dans la classe Client, il faut renseigner le base_path "http://localhost:9042" (adresse du serveur Docker)
 * Voir https://github.com/studoo-app/mock-ecole-directe-api
 */

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $client = new Client([
        "base_path" => "http://localhost:9042",
        "client_id" => $_POST['username'],
        "client_secret" => $_POST['password'],
    ]);
    // Recupération du token et profile
    $etudiant = $client->fetchAccessToken();
    echo "Token: {$etudiant->getToken()} <br>";
    echo "Email: {$etudiant->getEmail()} <br>";
    echo "Nom: {$etudiant->getNom()} <br>";
    echo "Prenom: {$etudiant->getPrenom()} <br>";
    echo "Identifiant: {$etudiant->getIdentifiant()} <br>";
} else {
    echo "<h1>API ECOLE DIRECTE via Form</h1>";
    echo "<form method='post'>";
    echo  "<label for='username'> Username </label>";
    echo  "<input type='text' name='username' id='username' required>";
    echo "<label for='password'> Password </label>";
    echo "<input type='password' name='password' id='password' required>";
    echo "<input type='submit' value='Envoyer'>";
    echo "</form>";
}