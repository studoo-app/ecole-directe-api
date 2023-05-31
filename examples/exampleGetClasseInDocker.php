<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Studoo\Api\EcoleDirecte\Client;

/**
 * Mise en place de l'environnement de développement via Mock
 * Voir https://github.com/studoo-app/mock-ecole-directe-api
 *
 */

if (isset($_POST['idclasse']) && isset($_POST['token'])) {
    $error = null;
    try {
        $client = new Client([
            "base_path"     => "http://localhost:9042",
            "mock"          => true
        ]);
        // Recupération du token et profile
        $classe = $client->getClasse($_POST['idclasse'], $_POST['token']);
    } catch (Exception $e) {
        $error = $e->getCode();
    }

    if ($error === 400) {
        echo "<h1>Nous rencontrons un problème de service, merci de retenter dans quelques minutes</h1>";
    } elseif ($error === 401) {
        echo "<h1>Identifiant ou mot de passe incorrect</h1>";
    } elseif ($error === 402) {
        echo "<h1>Problème de format, merci de contacter l'administrateur {$e->getMessage()}</h1>";
    } else {
        echo "<h1>Résultat API ECOLE DIRECTE</h1><pre>";
        var_dump($classe);
        echo "</pre>";
    }
} else {
    echo "<h1>API ECOLE DIRECTE via Form</h1>";
    echo "<form method='post'>";
    echo  "<label for='token'> Token </label>";
    echo  "<input type='text' name='token' id='token' value='{$_GET["token"]}' required>";
    echo "<label for='idclasse'> ID Classe </label>";
    echo "<input type='text' name='idclasse' id='idclasse' value='{$_GET["idclasse"]}' required>";
    echo "<input type='submit' value='Envoyer'>";
    echo "</form>";
}