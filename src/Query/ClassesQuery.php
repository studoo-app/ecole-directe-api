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
use Studoo\Api\EcoleDirecte\Entity\Classe;
use Studoo\Api\EcoleDirecte\Entity\Eleve;
use Studoo\Api\EcoleDirecte\Exception\NotDataResponseException;

/**
 * Traitement de la requête sur la liste des étudiants par requête API EcoleDirecte
 * @package Studoo\Api\EcoleDirecte\Query
 */
class ClassesQuery extends Query implements EntityQueryInterface
{
    use BuildEntity;
    public function __construct()
    {
        $this->methode = 'POST';
        $this->path = [
            'prod'    => 'classes/<ID>/eleves.awp?verbe=get',
            'test'    => 'classes/<ID>/eleves'
        ];
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
            $classe = new Classe();
            $classe->setId($data['data']['entity']['id']);
            $classe->setLibelle($data['data']['entity']['libelle']);
            $classe->setCode($data['data']['entity']['code']);
            $classe->setType($data['data']['entity']['type']);
            foreach ($data['data']['eleves'] as $eleve) {
                $eleveFinal = new Eleve();
                $this->hasPacked($eleveFinal, $eleve);
                $classe->setEleves($eleveFinal);
            }
            return $classe;
        }
        throw new NotDataResponseException();
    }
}
