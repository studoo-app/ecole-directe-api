<?php
/*
 * Ce fichier fait partie du ecole-directe-api.
 *
 * (c) redbull
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */


namespace Studoo\Api\EcoleDirecte\Service;

class Request
{
    private string $token;
    private string $base_path;
    private string $version;
    private string $client_id;
    private string $client_secret;
    private int $timeout;
    private int $connect_timeout;
    private bool $verify;
    private bool $debug;
    private array $headers;

    public function __construct(bool $token = false, array $config = [])
    {
        $this->token = $token;
        $this->base_path = $config['base_path'];
        $this->version = $config['version'];
        $this->client_id = $config['client_id'];
        $this->client_secret = $config['client_secret'];
        $this->timeout = $config['timeout'];
        $this->connect_timeout = $config['connect_timeout'];
        $this->verify = $config['verify'];
        $this->debug = $config['debug'];
        $this->headers = $config['headers'];
    }

    /**
     * @param string $methode
     * @param string $path
     * @param array $query
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function query(string $methode, string $path, array $query): array
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->base_path . '/' . $this->version . '/',
            'timeout' => $this->timeout,
            'connect_timeout' => $this->connect_timeout,
            'verify' => $this->verify,
            'debug' => $this->debug,
            'headers' => $this->headers,
        ]);

        $response = $client->request($methode, $path, $query);

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }
}
