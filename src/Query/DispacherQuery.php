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
 * Cette classe permet de dispatcher les requêtes
 * @package Studoo\Api\EcoleDirecte\Query
 */
trait DispacherQuery
{
    /**
     * Permet de dispatcher les requêtes et de retourner l'objet
     * @param string $model Nom du model de l'api
     * @return object Retourne l'objet de la requête
     * @throws \Exception
     */
    public function dispacherForModel(string $model) : object
    {
        $api = [
            "login" => LoginQuery::class
        ];

        if (array_key_exists($model, $api)) {
            return new $api[$model];
        } else {
            // TODO Personnaliser Exception
            throw new \Exception("Model not found");
        }
    }
}
