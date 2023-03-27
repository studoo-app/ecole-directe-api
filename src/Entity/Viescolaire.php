<?php
/*
 * Ce fichier fait partie du Studoo.
 *
 * (c) Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */


namespace Studoo\Api\EcoleDirecte\Entity;

class Viescolaire
{
    /**
     * Liste d'absences et de retards
     * @var array
     */
    private array $absencesRetards;

    /**
     * Liste de sanctions et d'encouragements
     * @var array
     */
    private array $sanctionsEncouragements;

    /**
     * Paramétrage de l'application
     * @var array
     */
    private array $parametrage;


    /**
     * Retourne la liste des absences et retards
     * @return array
     */
    public function getAbsencesRetards(): array
    {
        return $this->absencesRetards;
    }

    /**
     * Définit la liste des absences et retards
     * @param array $absencesRetards
     * @return Viescolaire
     */
    public function setAbsencesRetards(array $absencesRetards): Viescolaire
    {
        $this->absencesRetards = $absencesRetards;
        return $this;
    }

    /**
     * Retourne la liste des sanctions et encouragements
     * @return array
     */
    public function getSanctionsEncouragements(): array
    {
        return $this->sanctionsEncouragements;
    }

    /**
     * Définit la liste des sanctions et encouragements
     * @param array $sanctionsEncouragements
     * @return Viescolaire
     */
    public function setSanctionsEncouragements(array $sanctionsEncouragements): Viescolaire
    {
        $this->sanctionsEncouragements = $sanctionsEncouragements;
        return $this;
    }

    /**
     * Retourne le paramétrage de l'application
     * @return array
     */
    public function getParametrage(): array
    {
        return $this->parametrage;
    }

    /**
     * Définit le paramétrage de l'application
     * @param array $parametrage
     * @return Viescolaire
     */
    public function setParametrage(array $parametrage): Viescolaire
    {
        $this->parametrage = $parametrage;
        return $this;
    }
}
