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
use Studoo\Api\EcoleDirecte\Entity\Login;

/**
 * Traitement de la requête de connexion par requête API EcoleDirecte
 * @package Studoo\Api\EcoleDirecte\Query
 */
class LoginQuery extends Query implements EntityQueryInterface
{
    public function __construct()
    {
        $this->methode = 'POST';
        $this->path = 'login.awp';
        $this->query = [
            'identifiant' => '',
            'motdepasse' => ''
        ];
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

        if (isset($data['data']['accounts'][0]) === true) {
            self::hasPacked($login, $data['data']['accounts'][0]);
        } else {
            // TODO: Throw an exception
            throw new Exception('Aucune donnée n\'a été trouvée');
        }

        return $login;
    }
}
