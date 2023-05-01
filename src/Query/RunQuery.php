<?php
/*
 * Ce fichier fait partie du Studoo
 *
 * (c) Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */

namespace Studoo\Api\EcoleDirecte\Query;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Http\Message\ResponseInterface;
use Studoo\Api\EcoleDirecte\Exception\ErrorHttpStatusException;
use Studoo\Api\EcoleDirecte\Exception\InvalidCredentialsException;
use Studoo\Api\EcoleDirecte\Exception\InvalidModelException;
use Studoo\Api\EcoleDirecte\Service\Request;

/**
 * Traitements des requêtes API
 * @package Studoo\Api\EcoleDirecte\Query
 */
class RunQuery
{
    use DispacherQuery;

    /**
     * @var EntityQueryInterface $apiModel Modèle de requête
     */
    private EntityQueryInterface $apiModel;

    /**
     * @var array<mixed> $config Configuration de l'API
     */
    private array $config;


    /**
     * BuildQuery constructor.
     * @param string $model Nom d'appel API
     * @param array<mixed> $config Configuration de l'API
     * @throws InvalidModelException
     */
    public function __construct(string $model, array $config)
    {
        $this->apiModel = $this->dispacherForModel($model);
        $this->config = $config;
    }

    /**
     * Exécute la requête API et renvoi le résultat en objet
     * @param array<mixed> $body Données à envoyer dans la requête
     * @param array<mixed> $headers Entêtes à envoyer dans la requête
     * @param array<mixed> $param Paramètres à envoyer dans la requête
     * @return object
     * @throws GuzzleException
     * @throws JsonException
     * @throws ErrorHttpStatusException
     * @throws InvalidCredentialsException
     */
    public function run(
        array $body = [],
        array $headers = [
            'Content-Type' => 'text/plain',
        ],
        array $param = []
    ): object {
        // Add pathID to path ('pathID' => [])
        if (isset($param['pathID'])) {
            $this->apiModel->setParamToPath($param['pathID']);
        }
        // Fix body si vide
        (count($body) != 0) ? $bodyReponse = json_encode($body, JSON_THROW_ON_ERROR) : $bodyReponse = "{}";

        $response = (new Request(config: $this->config))->query(
            methode: $this->apiModel->getMethode(),
            path: $this->apiModel->getPath($this->config["mock"]),
            query: [
                'body' => 'data=' . $bodyReponse,
                'headers' => $headers,
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new ErrorHttpStatusException();
        }

        if (str_contains($response->getBody()->getContents(), "Login/Password is not available") === true) {
            throw new InvalidCredentialsException();
        }

        $response->getBody()->rewind();
        $this->apiModel->setrawSource($response);
        return $this->buildModel($response);
    }

    /**
     * Construit l'objet à partir de la réponse de l'API
     * @param ResponseInterface $response
     * @return object
     * @throws JsonException
     */
    private function buildModel(ResponseInterface $response): object
    {
        return $this->apiModel->buildEntity(
            json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR)
        );
    }
}
