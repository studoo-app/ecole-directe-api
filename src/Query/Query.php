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

    public function setParamToPath(array $pathID): Query
    {
        foreach ($pathID as $search => $replace) {
            $this->path = str_replace("<{$search}>", $replace, $this->path);
        }
        return $this;
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
     * @return ResponseInterface
     */
    public function getRawSource(): ResponseInterface
    {
        return $this->rawSource;
    }

    /**
     * @param ResponseInterface $rawSource
     * @return Query
     */
    public function setRawSource(ResponseInterface $rawSource): Query
    {
        $this->rawSource = $rawSource;
        return $this;
    }
}
