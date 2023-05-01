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

use Studoo\Api\EcoleDirecte\Core\BuildEntity;
use Studoo\Api\EcoleDirecte\Entity\Login;
use Studoo\Api\EcoleDirecte\Exception\NotDataResponseException;

/**
 * Traitement de la requête de connexion par requête API EcoleDirecte
 * @package Studoo\Api\EcoleDirecte\Query
 */
class LoginQuery extends Query implements EntityQueryInterface
{
    public function __construct()
    {
        $this->methode = 'POST';
        $this->path = [
            'prod'    => 'login.awp',
            'test'    => 'login'
        ];
        $this->query = [
            'identifiant' => '',
            'motdepasse' => ''
        ];
    }

    /**
     * Retourne l'entité de la requête API
     * @param array<mixed> $data
     * @return object
     * @throws NotDataResponseException
     */
    public function buildEntity(array $data): object
    {
        if (isset($data['data']['accounts'][0]) === true) {
            $login = new Login();
            $login->setToken($data['token']);
            BuildEntity::hasPacked($login, $data['data']['accounts'][0]);
            $classe = ($data['data']['accounts'][0]["typeCompte"] === "P") ? "classes" : "classe";
            $login->setClasse($data['data']['accounts'][0]["profile"][$classe]);
            return $login;
        }
        throw new NotDataResponseException();
    }
}
