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
    private array $absencesRetards;

    private array $sanctionsEncouragements;

    private array $parametrage;

    /**
     * @return array
     */
    public function getAbsencesRetards(): array
    {
        return $this->absencesRetards;
    }

    /**
     * @param array $absencesRetards
     * @return Viescolaire
     */
    public function setAbsencesRetards(array $absencesRetards): Viescolaire
    {
        $this->absencesRetards = $absencesRetards;
        return $this;
    }

    /**
     * @return array
     */
    public function getSanctionsEncouragements(): array
    {
        return $this->sanctionsEncouragements;
    }

    /**
     * @param array $sanctionsEncouragements
     * @return Viescolaire
     */
    public function setSanctionsEncouragements(array $sanctionsEncouragements): Viescolaire
    {
        $this->sanctionsEncouragements = $sanctionsEncouragements;
        return $this;
    }

    /**
     * @return array
     */
    public function getParametrage(): array
    {
        return $this->parametrage;
    }

    /**
     * @param array $parametrage
     * @return Viescolaire
     */
    public function setParametrage(array $parametrage): Viescolaire
    {
        $this->parametrage = $parametrage;
        return $this;
    }
}
