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
}

?>

<html>
<head>
    <title>API Ecole Directe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>API ECOLE DIRECTE via Login</h1>
                <form method='post'>
                    <label for='username'> Username </label>
                    <input type='text' name='username' id='username' required>

                    <label for='password'> Password </label>
                    <input type='password' name='password' id='password' required>
                    <input type='submit' value='Envoyer'>
                </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if (isset($etudiant) || isset($error)) : ?>
                <h1>Résultat API ECOLE DIRECTE</h1>
                    <?php
                        if ($error === 400) {
                            echo '<div class="alert alert-warning">Nous rencontrons un problème de service, merci de retenter dans quelques minutes</div>';
                        } elseif ($error === 401) {
                            echo '<div class="alert alert-warning">Identifiant ou mot de passe incorrect</div>';
                        } elseif ($error === 402) {
                            echo '<div class="alert alert-warning">Problème de format, merci de contacter l\'administrateur</div>';
                        } else {
                            echo "Token: {$etudiant->getToken()} <br>";
                            echo "Email: {$etudiant->getEmail()} <br>";
                            echo "Nom: {$etudiant->getNom()} <br>";
                            echo "Prenom: {$etudiant->getPrenom()} <br>";
                            echo "Identifiant: {$etudiant->getIdentifiant()} <br><br>";

                            echo "<h3>Liste de la/les classe.s</h3>";

                            foreach ($etudiant->getClasse() as $classe) {
                                echo "<a href='exampleGetClasseInDocker.php?token={$etudiant->getToken()}&idclasse={$classe['id']}'> Identifiant Classe: {$classe['id']} - Lib Classe: {$classe['libelle']}</a><br><br>";
                            }
                        }
                    ?>
            <?php endif; ?>
        </div>
</body>
</html>

