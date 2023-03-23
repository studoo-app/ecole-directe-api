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
     * @param array $data
     * @return object
     */
    public function buildEntity(array $data): object;

    /**
     * Retourne la méthode de la requête
     * @example POST
     * @return string
     */
    public function getMethode() : string;

    /**
     * Retourne le chemin de la requête
     * @example login.awp
     * @return string
     */
    public function getPath(): string;

    /**
     * Retourne les paramètres de la requête
     * @example ['identifiant' => '', 'motdepasse' => '']
     * @return array
     */
    public function getQuery(): array;
}
