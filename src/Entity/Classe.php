<?php
/*
 * Ce fichier fait partie du ecole-directe-api.
 *
 * (c) redbull
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */

namespace Studoo\Api\EcoleDirecte\Entity;

class Classe
{
    /**
     * @var array<Eleve> $eleves La liste des élèves de la classe
     * @codeTest 01
     */
    private array $eleves = [];

    /**
     * @var int $id L'identifiant de la classe
     * @codeTest 02
     */
    private int $id;

    /**
     * @var string $code Le code de la classe
     * @codeTest 03
     */
    private string $code;

    /**
     * @var string $libelle Le libellé de la classe
     * @codeTest 04
     */
    private string $libelle;

    /**
     * @var string $type Le type de la classe
     * @codeTest 05
     */
    private string $type;

    /**
     * @var bool $isFlexible La flexibilité de la classe
     * @codeTest 06
     */
    private bool $isFlexible;

    /**
     * Retourne la liste des élèves de la classe
     * @return array<Eleve>
     */
    public function getEleves(): array
    {
        return $this->eleves;
    }

    /**
     * Ajout d'un élève à la classe
     * @param Eleve $eleves
     * @return Classe
     */
    public function setEleves(Eleve $eleves): Classe
    {
        $this->eleves[] = $eleves;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Classe
     */
    public function setId(int $id): Classe
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Classe
     */
    public function setCode(string $code): Classe
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     * @return Classe
     */
    public function setLibelle(string $libelle): Classe
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Classe
     */
    public function setType(string $type): Classe
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFlexible(): bool
    {
        return $this->isFlexible;
    }

    /**
     * @param bool $isFlexible
     * @return Classe
     */
    public function setIsFlexible(bool $isFlexible): Classe
    {
        $this->isFlexible = $isFlexible;
        return $this;
    }


}
