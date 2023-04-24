<?php
/*
 * Ce fichier fait partie du Studoo
 *
 * @author Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */

namespace Studoo\Api\EcoleDirecte;

use GuzzleHttp\Exception\GuzzleException;
use Studoo\Api\EcoleDirecte\Exception\ErrorHttpStatusException;
use Studoo\Api\EcoleDirecte\Exception\InvalidModelException;
use Studoo\Api\EcoleDirecte\Query\RunQuery;

/**
 * API Client pour communiquer avec EcoleDirecte
 * @package Studoo\Api\EcoleDirecte
 */
class Client
{
    private const LIBVER = '0.1.3';

    private const API_BASE_PATH = 'https://apip.ecoledirecte.com';

    private const API_VERSION = 'v3';

    /**
     * Configuration de l'API
     * @var array<mixed>
     */
    private array $config;

    /**
     * Objet Login contenant les informations de connexion et de l'utilisateur
     * @var object
     */
    private object $login;

    /**
     * Client constructor.
     * @param array<mixed> $config Configuration de l'API
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'base_path'       => self::API_BASE_PATH,
            'version'         => self::API_VERSION,
            'client_id'       => '',
            'client_secret'   => '',
            'timeout'         => 30,
            'connect_timeout' => 30,
            'verify'          => true,
            'cert'            => __DIR__ . '/Certificat/apip.ecoledirecte.com.pem',
            'debug'           => false,
            'headers'         => [
                'User-Agent'   => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
                'Accept'       => 'application/json',
                'Content-Type' => 'text/plain',
            ],
        ], $config);
    }
    //end __construct()

    /**
     * Accès à l'API EcoleDirecte avec les identifiants de l'utilisateur
     * @return object
     * @throws InvalidModelException|ErrorHttpStatusException
     */
    public function fetchAccessToken(): object
    {
        $token = new RunQuery("login", $this->config);
        try {
            return $token->run(
                body: [
                    'identifiant' => $this->config['client_id'],
                    'motdepasse'  => $this->config['client_secret']
                ]
            );
        } catch (GuzzleException|Exception\ErrorHttpStatusException $e) {
            throw new ErrorHttpStatusException();
        } catch (\JsonException $e) {
            throw new InvalidModelException();
        }
    }

    /**
     * Retourne les informations de l'utilisateur sur sa vie scolaire
     * @param int $idEtudiant Identifiant de l'étudiant
     * @param string $token Token de connexion
     * @return object
     * @throws InvalidModelException
     */
    public function getVieScolaire(int $idEtudiant, string $token): object
    {
        try {
            return (new RunQuery("viescolaire", $this->config))->run(
                headers: [
                    'X-Token'      => $token,
                    'Content-Type' => 'text/plain'
                ],
                param: [
                    'pathID' => [
                        'ID' => $idEtudiant
                    ]
                ]
            );
        } catch (GuzzleException $e) {
            throw new InvalidModelException($e->getMessage());
        } catch (\JsonException|Exception\ErrorHttpStatusException $e) {
            throw new InvalidModelException($e->getMessage());
        }
    }

    /**
     * Retourne la version de la librairie
     * @return string
     */
    public function getLibVerion(): string
    {
        return self::LIBVER;
    }
}
