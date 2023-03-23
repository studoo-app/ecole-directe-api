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

use Studoo\Api\EcoleDirecte\Core\BuildEntiy;
use Studoo\Api\EcoleDirecte\Entity\Login;

/**
 * Traitement de la requête de connexion par requête API EcoleDirecte
 * @package Studoo\Api\EcoleDirecte\Query
 */
class LoginQuery implements EntityQueryInterface
{
    private string $methode = "POST";
    private string $path = "login.awp";
    private array $query = [
        'identifiant' => '',
        'motdepasse' => ''
    ];

    /**
     * Retourne la méthode de la requête
     * @return string
     */
    public function getMethode(): string
    {
        return $this->methode;
    }

    /**
     * Retourne le chemin de la requête
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * retourne les paramètres de la requête
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * Retourne l'entité de la requête API
     * @param array $data
     * @return object
     */
    public function buildEntity(array $data): object
    {
        $login = new Login();
        $login->setToken($data['token']);

        BuildEntiy::hasPacked($login, $data['data']['accounts'][0]);

        return $login;
    }
}
