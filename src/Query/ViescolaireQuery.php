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
use Studoo\Api\EcoleDirecte\Entity\Viescolaire;
use Studoo\Api\EcoleDirecte\Exception\NotDataResponseException;

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
     * @param array<mixed> $data
     * @return object
     * @throws NotDataResponseException
     */
    public function buildEntity(array $data): object
    {
        if (isset($data['data']) === true) {
            $vieScolaire = new Viescolaire();
            BuildEntity::hasPacked($vieScolaire, $data['data']);
            return $vieScolaire;
        }
        throw new NotDataResponseException();
    }
}
