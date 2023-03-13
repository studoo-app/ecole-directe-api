![separe](https://github.com/studoo-app/.github/blob/main/profile/studoo-banner-logo.png)
# Ecole Directe API PHP

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/75072d716af54363b54de593e1f259d8)](https://app.codacy.com/gh/studoo-app/ecole-directe-api?utm_source=github.com&utm_medium=referral&utm_content=studoo-app/ecole-directe-api&utm_campaign=Badge_Grade_Settings)
[![Latest Stable Version](https://poser.pugx.org/studoo/ecole-directe-api/v)](//packagist.org/packages/studoo/ecole-directe-api) [![Total Downloads](https://poser.pugx.org/studoo/ecole-directe-api/downloads)](//packagist.org/packages/studoo/ecole-directe-api) [![Latest Unstable Version](https://poser.pugx.org/studoo/ecole-directe-api/v/unstable)](//packagist.org/packages/studoo/ecole-directe-api) [![License](https://poser.pugx.org/studoo/ecole-directe-api/license)](//packagist.org/packages/studoo/ecole-directe-api)

Utilisation de la librairie PHP pour l'API Ecole Directe (non officielle)

## Installation

```php
composer require ecole-directe-api
```

## Utilisation

Basic Authentification via le login et password fournis par Ecole Directe \
Mettre les variables d'environnement CLIENT_ID et CLIENT_SECRET via le fichier .env (dotenv)

```php
use EcoleDirecte\EcoleDirecte;

$client = new Client([
    "client_id" => $_ENV["CLIENT_ID"],
    "client_secret" => $_ENV["CLIENT_SECRET"],
]);
`
```

## Documentation

[https://github.com/studoo-app/ecole-directe-api-docs](https://github.com/studoo-app/ecole-directe-api-docs)

Vous pouvez tester l'API via Insomnia : 
[![Tester API avec Insomnia}](https://insomnia.rest/images/run.svg)](https://insomnia.rest/run/?label=Ecole%20Directe%20API&uri=https%3A%2F%2Fraw.githubusercontent.com%2Fstudoo-app%2Fapi-ecole-directe%2Fmain%2FInsomnia.json)
