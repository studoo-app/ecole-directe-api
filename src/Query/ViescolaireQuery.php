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
use Studoo\Api\EcoleDirecte\Entity\Viescolaire;

/**
 * Traitement de la requête sur la vie scolaire par requête API EcoleDirecte
 * @package Studoo\Api\EcoleDirecte\Query
 */
class ViescolaireQuery extends Query implements EntityQueryInterface
{
    public function __construct()
    {
        $this->methode = 'POST';
        $this->path = 'eleves/<ID>/viescolaire.awp?verbe=get';
        $this->query = [];
    }

    /**
     * Retourne l'entité de la requête API
     * @param array $data
     * @return object
     */
    public function buildEntity(array $data): object
    {
        $vieScolaire = new Viescolaire();

        if (isset($data['data'])) {
            BuildEntiy::hasPacked($vieScolaire, $data['data']);
        } else {
            // TODO: Throw an exception
            throw new \Exception('Aucune donnée n\'a été trouvée');
        }
        return $vieScolaire;
    }
}
