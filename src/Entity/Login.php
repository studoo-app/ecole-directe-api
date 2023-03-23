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
}
