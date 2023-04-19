<?php
/*
 * Ce fichier fait partie du Studoo.
 *
 * (c) Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */

namespace Studoo\Api\EcoleDirecte\Query;

use Psr\Http\Message\ResponseInterface;

class Query
{
    /**
     * @var string $methode Méthode de la requête
     */
    protected string $methode;

    /**
     * @var string $path Chemin de la requête
     */
    protected string $path;

    /**
     * @var array<mixed> $query Paramètres de la requête
     */
    protected array $query = [];

    /**
     * @var ResponseInterface $rawSource Source brute de la requête
     */
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
     * Définit le chemin de la requête
     * @param array<mixed> $pathID Tableau de remplacement des paramètres de la requête
     * @return $this
     */
    public function setParamToPath(array $pathID): Query
    {
        foreach ($pathID as $search => $replace) {
            $this->path = str_replace("<$search>", $replace, $this->path);
        }
        return $this;
    }

    /**
     * Retourne les paramètres de la requête
     * @return array<mixed>
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * Retourne la source brute de la requête
     * @return ResponseInterface
     */
    public function getRawSource(): ResponseInterface
    {
        return $this->rawSource;
    }

    /**
     * Définit la méthode de la requête
     * @param ResponseInterface $rawSource
     * @return Query
     */
    public function setRawSource(ResponseInterface $rawSource): Query
    {
        $this->rawSource = $rawSource;
        return $this;
    }
}
