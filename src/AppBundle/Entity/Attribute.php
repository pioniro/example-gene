<?php
namespace AppBundle\Entity;


class Attribute
{
    /**
     * @var Gene[]
     */
    protected $genes;

    /**
     * @var int
     */
    protected $length;

    /**
     * Attribute constructor.
     * @param int $length
     */
    public function __construct($length)
    {
        $this->length = $length;
        $this->genes = [];
    }

    /**
     * @return Gene[]
     */
    public function getGenes(): array
    {
        return $this->genes;
    }

    /**
     * @param Gene[] $genes
     */
    public function setGenes(array $genes)
    {
        if(count($genes) == $this->length)
            throw new \LogicException();
        $this->genes = $genes;
    }

    /**
     * @param Gene $gene
     */
    public function addGenes(Gene $gene)
    {
        if(count($this->genes) == $this->length)
            throw new \LogicException();
        $this->genes[] = $gene;
    }


    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }
}