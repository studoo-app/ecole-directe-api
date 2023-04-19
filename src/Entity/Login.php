<?php
/*
 * Ce fichier fait partie du Studoo
 *
 * @author Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */

namespace Studoo\Api\EcoleDirecte\Entity;

/**
 * Cette classe permet de gérer les données de connexion
 * @package Studoo\Api\EcoleDirecte\Entity
 */
class Login
{
    /**
     * Token de connexion
     * @var string
     */
    private string $token;

    /**
     * ID Login
     * @var string
     */
    private string $idLogin;

    /**
     * ID de l'utilisateur
     * @var string
     */
    private string $id;

    /**
     * UID de l'utilisateur
     * @var string
     */
    private string $uid;

    /**
     * Identifiant de l'utilisateur
     * @var string
     */
    private string $identifiant;

    /**
     * Type de compte
     * @var string
     */
    private string $typeCompte;

    /**
     * Email de l'utilisateur
     * @var string
     */
    private string $email;

    /**
     * Nom et de l'utilisateur
     * @var string
     */
    private string $nom;

    /**
     * Prenom de l'utilisateur
     * @var string
     */
    private string $prenom;

    /**
     * Année scolaire courante
     * @var string
     */
    private string $anneeScolaireCourante;

    /**
     * Nom de l'établissement
     * @var string
     */
    private string $nomEtablissement;

    /**
     * Profil de l'utilisateur
     * @var array<mixed>
     */
    private array $profile;

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getIdLogin(): string
    {
        return $this->idLogin;
    }

    public function setIdLogin(string $idLogin): self
    {
        $this->idLogin = $idLogin;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Login
     */
    public function setId(string $id): Login
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return Login
     */
    public function setUid(string $uid): Login
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifiant(): string
    {
        return $this->identifiant;
    }

    /**
     * @param string $identifiant
     * @return Login
     */
    public function setIdentifiant(string $identifiant): Login
    {
        $this->identifiant = $identifiant;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeCompte(): string
    {
        return $this->typeCompte;
    }

    /**
     * @param string $typeCompte
     * @return Login
     */
    public function setTypeCompte(string $typeCompte): Login
    {
        $this->typeCompte = $typeCompte;
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
     * @return Login
     */
    public function setEmail(string $email): Login
    {
        $this->email = $email;
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
     * @return Login
     */
    public function setNom(string $nom): Login
    {
        $this->nom = $nom;
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
     * @return Login
     */
    public function setPrenom(string $prenom): Login
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnneeScolaireCourante(): string
    {
        return $this->anneeScolaireCourante;
    }

    /**
     * @param string $anneeScolaireCourante
     * @return Login
     */
    public function setAnneeScolaireCourante(string $anneeScolaireCourante): Login
    {
        $this->anneeScolaireCourante = $anneeScolaireCourante;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomEtablissement(): string
    {
        return $this->nomEtablissement;
    }

    /**
     * @param string $nomEtablissement
     * @return Login
     */
    public function setNomEtablissement(string $nomEtablissement): Login
    {
        $this->nomEtablissement = $nomEtablissement;
        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getProfile(): array
    {
        return $this->profile;
    }

    /**
     * @param array<mixed> $profile
     * @return Login
     */
    public function setProfile(array $profile): Login
    {
        $this->profile = $profile;
        return $this;
    }
}
