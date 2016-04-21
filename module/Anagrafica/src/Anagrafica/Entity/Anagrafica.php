<?php

namespace Anagrafica\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

/**
 * Anagrafica
 *
 * @ORM\Table(name="Anagrafica")
 * @ORM\Entity(repositoryClass="Anagrafica\Entity\Repository\AnagraficaRepository")
 */
class Anagrafica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codice", type="string", nullable=false)
     */
    private $codice;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", nullable=false)
     */
    private $nome;

    public function __construct($codice, $nome) {
        $this->codice = $codice;
        $this->nome = $nome;

    /**
     * Get id
     *
     * @return integer
     */
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codice
     *
     * @param string $codice
     *
     * @return Anagrafica
     */
    public function setCodice($codice)
    {
        $this->codice = $codice;

        return $this;
    }

    /**
     * Get codice
     *
     * @return string
     */
    public function getCodice()
    {
        return $this->codice;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Anagrafica
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }
}
