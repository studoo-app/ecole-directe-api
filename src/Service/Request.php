<?php
/*
 * Ce fichier fait partie du Studoo
 *
 * @author Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */

namespace Studoo\Api\EcoleDirecte\Service;

use Psr\Http\Message\ResponseInterface;

/**
 * Traitement de la réponse
 * @package Studoo\Api\EcoleDirecte\Service
 */
class Request
{
    private string $basePath;
    private string $version;
    private int $timeout;
    private int $connectTimeout;
    private bool $verify;
    private bool $debug;
    private array $headers;

    public function __construct(array $config = [])
    {
        $this->basePath = $config['base_path'];
        $this->version = $config['version'];
        $this->timeout = $config['timeout'];
        $this->connectTimeout = $config['connect_timeout'];
        $this->verify = $config['verify'];
        $this->debug = $config['debug'];
        $this->headers = $config['headers'];
    }

    /**
     * Requete vers l'API
     * @param string $methode Method of the request (GET, POST, PUT, DELETE)
     * @param string $path Path of the request (ex: 'v3/eleves/123456789')
     * @param array $query Query of the request (ex: ['body' => 'data=', 'headers' => ['Content-Type' => 'text/plain']])
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function query(
        string $methode,
        string $path,
        array  $query = ['body' => 'data=',
            'headers' => [
                'Content-Type' => 'text/plain',
            ]
        ]
    ): ResponseInterface
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->basePath . '/' . $this->version . '/',
            'timeout' => $this->timeout,
            'connect_timeout' => $this->connectTimeout,
            'verify' => $this->verify,
            'debug' => $this->debug,
            'headers' => $this->headers,
        ]);

        return $client->request($methode, $path, $query);
    }
}
