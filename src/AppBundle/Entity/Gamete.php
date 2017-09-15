<?php

namespace AppBundle\Entity;


class Gamete
{
    /** @var Allele[] */
    protected $alleles;

    /**
     * Gamete constructor.
     */
    public function __construct()
    {
        $this->alleles = [];
    }

    /**
     * @return Allele[]
     */
    public function getAlleles(): array
    {
        return $this->alleles;
    }

    /**
     * @param Allele[] $alleles
     */
    public function setAlleles(array $alleles)
    {
        $this->alleles = $alleles;
    }

    /**
     * @param Allele $allele
     */
    public function addAlleles($allele)
    {
        $this->alleles[] = $allele;
    }

    function __toString() : string
    {
        $str = '';
        foreach($this->alleles as $allele){
            $str .= strval($allele);
        }
        return $str;
    }


}