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

use Studoo\Api\EcoleDirecte\Exception\InvalidModelException;

/**
 * Cette classe permet de dispatcher les requêtes
 * @package Studoo\Api\EcoleDirecte\Query
 */
trait DispacherQuery
{
    /**
     * Permet de dispatcher les requêtes et de retourner l'objet
     * @param string $model Nom du model de l'api
     * @return EntityQueryInterface Retourne l'objet de la requête
     * @throws InvalidModelException
     */
    public function dispacherForModel(string $model): EntityQueryInterface
    {
        $api = [
            "login"       => LoginQuery::class,
            "viescolaire" => ViescolaireQuery::class,
            "classes"     => ClassesQuery::class
        ];

        if (array_key_exists($model, $api)) {
            return new $api[$model]();
        }
        throw new InvalidModelException();
    }
}
