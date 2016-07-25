<?php

namespace Prodotti\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

/**
 * Prodotti
 *
 * @ORM\Table(name="prodotti")
 * @ORM\Entity(repositoryClass="Prodotti\Entity\Repository\ProdottiRepository")
 */
class Prodotto
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

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="text", nullable=true)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="ingredienti", type="text", nullable=true)
     */
    private $ingredienti;

    /**
     * @var string
     *
     * @ORM\Column(name="prezzo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $prezzo;

    /**
     * @var \Prodotti\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="Prodotti\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;

    public function __construct($codice, $nome, $descrizione, $ingredienti, $prezzo, $categoria) {
        $this->codice = $codice;
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->ingredienti = $ingredienti;
        $this->prezzo = $prezzo;
        $this->categoria = $categoria;
    }

    public function toArray()
    {
        return [
            'codice' => $this->codice,
            'nome' => $this->nome,
            'descrizione' => $this->descrizione,
            'ingredienti' => $this->ingredienti,
            'prezzo' => $this->prezzo,
            'categoria' => $this->categoria->getNome(),
        ];
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codice
     *
     * @param string $codice
     *
     * @return Prodotto
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
     * @return Prodotto
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

    /**
     * Set descrizione
     *
     * @param string $descrizione
     *
     * @return Prodotto
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * Get descrizione
     *
     * @return string
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set ingredienti
     *
     * @param string $ingredienti
     *
     * @return Prodotto
     */
    public function setIngredienti($ingredienti)
    {
        $this->ingredienti = $ingredienti;

        return $this;
    }

    /**
     * Get ingredienti
     *
     * @return string
     */
    public function getIngredienti()
    {
        return $this->ingredienti;
    }

    /**
     * Set prezzo
     *
     * @param string $prezzo
     *
     * @return Prodotto
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;

        return $this;
    }

    /**
     * Get prezzo
     *
     * @return string
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * Get categoria
     *
     * @return Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set categoria
     *
     * @param Categoria $categoria
     *
     * @return Prodotto
     */
    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}
