<?php
/*
 * Ce fichier fait partie du ecole-directe-api.
 *
 * (c) redbull
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */


namespace Studoo\Api\EcoleDirecte\Query;

use Psr\Http\Message\ResponseInterface;

class Query
{
    protected string $methode;
    protected string $path;
    protected array $query = [];
    protected ResponseInterface $rawSource;

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
     * @return array
     */
    public function getRawSource(): array
    {
        return $this->rawSource;
    }

    /**
     * @param array $rawSource
     * @return LoginQuery
     */
    public function setRawSource(array $rawSource): LoginQuery
    {
        $this->rawSource = $rawSource;
        return $this;
    }
}