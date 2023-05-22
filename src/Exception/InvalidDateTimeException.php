<?php
/*
 * Ce fichier fait partie du Studoo
 *
 * @author Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */

namespace Studoo\Api\EcoleDirecte\Exception;

class InvalidDateTimeException extends \Exception
{
    /**
     * @var string
     */
    protected $message = "Invalid DateTime format";

    /**
     * @var int
     */
    protected $code = 404;
}
