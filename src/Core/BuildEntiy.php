<?php
/*
 * Ce fichier fait partie du ecole-directe-api.
 *
 * (c) Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */


namespace Studoo\Api\EcoleDirecte\Core;

/**
 * Traitement d'une entité
 * @package Studoo\Api\EcoleDirecte\Core
 */
class BuildEntiy
{
    /**
     * Rempli l'entité avec les données d'un tableau
     * @param object $entity
     * @param array $data
     * @return object
     */
    public static function hasPacked(object $entity, array $data): object
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($entity, $method)) {
                $entity->$method($value);
            }
        }

        return $entity;
    }

}
