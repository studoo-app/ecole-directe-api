<?php
/*
 * Ce fichier fait partie du Studoo
 *
 * (c) Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */


namespace Studoo\Api\EcoleDirecte;

use Studoo\Api\EcoleDirecte\Entity\Login;
use Studoo\Api\EcoleDirecte\Exception\InvalidCredentialsException;

/**
 * The Studoo EcoleDirecte API Client
 * @package Studoo\Api\EcoleDirecte
 */
class Client
{
    private const LIBVER = '0.1.0';
    private const API_BASE_PATH = 'https://apip.ecoledirecte.com';
    private const API_VERSION = 'v3';
    private array $config = [];
    private Login $login;

    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'base_path' => self::API_BASE_PATH,
            'version' => self::API_VERSION,
            'client_id' => '',
            'client_secret' => '',
            'timeout' => 30,
            'connect_timeout' => 30,
            'verify' => true,
            'debug' => false,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ], $config);
    }

    /**
     * Returns Login containing the token
     * @return Login
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws InvalidCredentialsException
     */
    public function fetchAccessToken(): Login
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->config['base_path'] . '/' . $this->config['version'] . '/',
            'timeout' => $this->config['timeout'],
            'connect_timeout' => $this->config['connect_timeout'],
            'verify' => $this->config['verify'],
            'debug' => $this->config['debug'],
            'headers' => $this->config['headers'],
        ]);

        $response = $client->request('POST', 'login.awp', [
            'body' => 'data='. json_encode([
                    'identifiant' => $this->config['client_id'],
                    'motdepasse' => $this->config['client_secret']
                ], JSON_THROW_ON_ERROR),
            'headers' => [
                'Content-Type' => 'text/plain',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        if ($data['code'] === 200) {
            $this->login = new Login($data['token']);
        } else {
            throw new InvalidCredentialsException();
        }

        return $this->login;
    }

    /**
     * Returns the library version
     * @return string
     */
    public function getLibVerion(): string
    {
        return self::LIBVER;
    }

}
