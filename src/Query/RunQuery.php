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

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Http\Message\ResponseInterface;
use Studoo\Api\EcoleDirecte\Service\Request;

/**
 * Traitements des requêtes API
 * @package Studoo\Api\EcoleDirecte\Query
 */
class RunQuery
{
    use DispacherQuery;

    private object $apiModel;
    private array $config;

    /**
     * BuildQuery constructor.
     * @param string $model Nom d'appel API
     * @param array $config Configuration de l'API
     * @throws Exception
     */
    public function __construct(string $model, array $config)
    {
        $finalModel = $this->dispacherForModel($model);
        // TODO Mettre un try catch pour la gestion d'erreur
        $this->apiModel = new $finalModel();
        $this->config = $config;
    }

    /**
     * Exécute la requête API et renvoi le résultat en objet
     * @param array $body Données à envoyer dans la requête
     * @param array $headers Entêtes à envoyer dans la requête
     * @param array $param Paramètres à envoyer dans la requête
     * @return object
     * @throws GuzzleException
     * @throws JsonException
     */
    public function run(
        array $body = [],
        array $headers = [
            'Content-Type' => 'text/plain',
        ],
        array $param = []
    ): object
    {
        // Add pathID to path ('pathID' => [])
        (isset($param['pathID'])) ? $this->apiModel->setParamToPath($param['pathID']) : null;
        // Fix body si vide
        (isset($body) && count($body) > 0) ? $bodyReponse = json_encode($body, JSON_THROW_ON_ERROR) : $bodyReponse = "{}";

        // TODO Faire une verif et merge de body
        $response = (new Request(config: $this->config))->query(
            methode: $this->apiModel->getMethode(),
            path: $this->apiModel->getPath(),
            query: [
                'body' => 'data=' . $bodyReponse,
                'headers' => $headers,
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Error');
        }

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
