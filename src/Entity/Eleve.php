<?php
/*
 * Ce fichier fait partie du ecole-directe-api.
 *
 * (c) Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */


namespace Studoo\Api\EcoleDirecte\Entity;

use Exception;
use Studoo\Api\EcoleDirecte\Exception\InvalidDateTimeException;

class Eleve
{
    private int $id;
    private string $nom;
    private string $particule;
    private string $prenom;
    private string $sexe;
    private int $classeId;
    private int $classeLibelle;
    private \DateTime $dateEntree;
    private \DateTime $dateSortie;
    private string $numeroBadge;
    private string $regime;
    private string $email;
    private string $portable;
    private string $photo;
    private ?\DateTime $dateNaissance;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Eleve
     */
    public function setId(int $id): Eleve
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Eleve
     */
    public function setNom(string $nom): Eleve
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getParticule(): string
    {
        return $this->particule;
    }

    /**
     * @param string $particule
     * @return Eleve
     */
    public function setParticule(string $particule): Eleve
    {
        $this->particule = $particule;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Eleve
     */
    public function setPrenom(string $prenom): Eleve
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getSexe(): string
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     * @return Eleve
     */
    public function setSexe(string $sexe): Eleve
    {
        $this->sexe = $sexe;
        return $this;
    }

    /**
     * @return int
     */
    public function getClasseId(): int
    {
        return $this->classeId;
    }

    /**
     * @param int $classeId
     * @return Eleve
     */
    public function setClasseId(int $classeId): Eleve
    {
        $this->classeId = $classeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getClasseLibelle(): int
    {
        return $this->classeLibelle;
    }

    /**
     * @param int $classeLibelle
     * @return Eleve
     */
    public function setClasseLibelle(int $classeLibelle): Eleve
    {
        $this->classeLibelle = $classeLibelle;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateEntree(): \DateTime
    {
        return $this->dateEntree;
    }

    /**
     * @param \DateTime $dateEntree
     * @return Eleve
     */
    public function setDateEntree(\DateTime $dateEntree): Eleve
    {
        $this->dateEntree = $dateEntree;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateSortie(): \DateTime
    {
        return $this->dateSortie;
    }

    /**
     * @param \DateTime $dateSortie
     * @return Eleve
     */
    public function setDateSortie(\DateTime $dateSortie): Eleve
    {
        $this->dateSortie = $dateSortie;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroBadge(): string
    {
        return $this->numeroBadge;
    }

    /**
     * @param string $numeroBadge
     * @return Eleve
     */
    public function setNumeroBadge(string $numeroBadge): Eleve
    {
        $this->numeroBadge = $numeroBadge;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegime(): string
    {
        return $this->regime;
    }

    /**
     * @param string $regime
     * @return Eleve
     */
    public function setRegime(string $regime): Eleve
    {
        $this->regime = $regime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Eleve
     */
    public function setEmail(string $email): Eleve
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPortable(): string
    {
        return $this->portable;
    }

    /**
     * @param string $portable
     * @return Eleve
     */
    public function setPortable(string $portable): Eleve
    {
        $this->portable = $portable;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return Eleve
     */
    public function setPhoto(string $photo): Eleve
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateNaissance(): ?\DateTime
    {
        return $this->dateNaissance;
    }

    /**
     * @param string $dateNaissance
     * @return Eleve
     * @throws InvalidDateTimeException
     */
    public function setDateNaissance(string $dateNaissance): Eleve
    {
        try {
            $this->dateNaissance = ($dateNaissance !== "") ? new \DateTime($dateNaissance) : null;
        } catch (Exception) {
            throw new InvalidDateTimeException("La date de naissance n'est pas valide");
        }

        return $this;
    }
}
