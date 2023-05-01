<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Studoo\Api\EcoleDirecte\Client;

/**
 * Mise en place de l'environnement de développement via Mock
 * Voir https://github.com/studoo-app/mock-ecole-directe-api
 *
 * Dans la classe Client, il faut renseigner dans le tableau en config :
 * base_path => "http://localhost:9042" (adresse du serveur Docker)
 * mock => true (activation du mock au niveau des appels API)
 *
 */

if (isset($_POST['username']) && isset($_POST['password'])) {
    $error = null;
    try {
        $client = new Client([
            "base_path"     => "http://localhost:9042",
            "mock"          => true,
            "client_id"     => $_POST['username'],
            "client_secret" => $_POST['password']
        ]);
        // Recupération du token et profile
        $etudiant = $client->fetchAccessToken();
    } catch (Exception $e) {
        $error = $e->getCode();
    }

    if ($error === 400) {
        echo "<h1>Nous rencontrons un problème de service, merci de retenter dans quelques minutes</h1>";
    } elseif ($error === 401) {
        echo "<h1>Identifiant ou mot de passe incorrect</h1>";
    } elseif ($error === 402) {
        echo "<h1>Problème de format, merci de contacter l'administrateur</h1>";
    } else {
        echo "<h1>Résultat API ECOLE DIRECTE</h1>";
        echo "Token: {$etudiant->getToken()} <br>";
        echo "Email: {$etudiant->getEmail()} <br>";
        echo "Nom: {$etudiant->getNom()} <br>";
        echo "Prenom: {$etudiant->getPrenom()} <br>";
        echo "Identifiant: {$etudiant->getIdentifiant()} <br>";
    }
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