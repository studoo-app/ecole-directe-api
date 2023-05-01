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

use Psr\Http\Message\ResponseInterface;

/**
 * Cette interface permet de définir les méthodes d'une requête
 * @example LoginQuery
 * @package Studoo\Api\EcoleDirecte\Query
 */
interface EntityQueryInterface
{
    /**
     * Rempli l'objet avec les données de l'api
     * Il est possible de remplir l'objet avec la méthode BuildEntiy::hasPacked
     * @example
     *         $login = new Login();
     *         $login->setToken($data['token']);
     *         BuildEntiy::hasPacked($login, $data['data']['accounts'][0]);
     *         return $login;
     *
     * @param array<mixed> $data
     * @return object
     */
    public function buildEntity(array $data): object;

    /**
     * Retourne la méthode de la requête
     * @example POST
     * @return string
     */
    public function getMethode(): string;

    /**
     * Retourne le chemin de la requête
     * @example login.awp
     * @return string
     */
    public function getPath(bool $mock = false): string;

    /**
     * Retourne les paramètres de la requête
     * @example ['identifiant' => '', 'motdepasse' => '']
     * @return array<mixed>
     */
    public function getQuery(): array;

    /**
         * Retourne la source brute de la requête
         * @return ResponseInterface
         */
    public function getRawSource(): ResponseInterface;

    /**
     * Définit la source brute de la requête
     * @param ResponseInterface $response
     * @return Query
     */
    public function setRawSource(ResponseInterface $response): Query;

    /**
     * Définit le chemin de la requête
     * @param array<mixed> $param
     * @return Query
     */
    public function setParamToPath(array $param): Query;
}
