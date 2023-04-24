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

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Traitement de la réponse
 * @package Studoo\Api\EcoleDirecte\Service
 */
class Request
{
    /**
     * @var string $basePath Base path of the API
     */
    private string $basePath;

    /**
     * @var string $version Version of the API
     */
    private string $version;

    /**
     * @var int $timeout Timeout of the request
     */
    private int $timeout;

    /**
     * @var int $connectTimeout
     */
    private int $connectTimeout;

    /**
     * @var bool $verify Verify SSL
     */
    private bool $verify;

    /**
     * @var bool $debug Debug mode
     */
    private bool $debug;

    /**
     * @var array<mixed> $headers Headers of the request
     */
    private array $headers;

    /**
     * Request constructor.
     * @param array<mixed> $config
     */
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
     * Request vers l'API
     * @param string $methode Method of the request (GET, POST, PUT, DELETE)
     * @param string $path Path of the request (ex: 'v3/eleves/123456789')
     * @param array<mixed> $query Query of the request (ex: ['body' => 'data=', 'headers' => ['Content-Type' => 'text/plain']])
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function query(
        string $methode,
        string $path,
        array  $query = [
            'body'    => 'data={}',
            'headers' => [
                'Content-Type' => 'text/plain',
            ]
        ]
    ): ResponseInterface {
        $this->headers = array_merge($this->headers, $query['headers']);

        $client = new Client([
            'base_uri'        => $this->basePath . '/' . $this->version . '/',
            'timeout'         => $this->timeout,
            'connect_timeout' => $this->connectTimeout,
            'verify'          => $this->verify,
            'debug'           => $this->debug,
            'headers'         => $this->headers,
        ]);

        return $client->request($methode, $path, $query);
    }
}
