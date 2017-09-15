<?php

namespace AppBundle\Entity;


class Gene
{
    const aa = 0; // aa
    const Aa = 1; // Aa
    const aA = 2; // aA
    const AA = 3; // AA

    const MAP_ALLELES_TO_GENE = [
        Allele::a => [
            Allele::a => self::aa,
            Allele::A => self::aA,
        ],
        Allele::A => [
            Allele::a => self::Aa,
            Allele::A => self::AA,
        ],
    ];

    /**
     * @var Allele[]
     */
    protected $alleles;

    /**
     * @var
     */
    protected $string;

    /**
     * @var int
     */
    protected $value;

    /**
     * Gene constructor.
     * @param int $value self::AA | self::Aa | self::aA | self::aa
     */
    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @param Allele $allele1
     * @param Allele $allele2
     * @return Gene
     */
    public static function createFromAlleles(Allele $allele1, Allele $allele2): Gene
    {
        return new Gene(self::MAP_ALLELES_TO_GENE[$allele1->getValue()][$allele2->getValue()]);
    }

    /**
     * @return array|Allele[]
     */
    public function getAlleles(): array
    {
        return $this->alleles;
    }

    function __toString(): string
    {
        return $this->string;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value)
    {
        switch (intval($value)) {
            case self::aa:
                $this->string = 'aa';
                $this->alleles = [new Allele(0), new Allele(0)];
                break;
            case self::Aa:
                $this->string = 'Aa';
                $this->alleles = [new Allele(1), new Allele(0)];
                break;
            case self::aA:
                $this->string = 'aA';
                $this->alleles = [new Allele(0), new Allele(1)];
                break;
            case self::AA:
                $this->string = 'AA';
                $this->alleles = [new Allele(1), new Allele(1)];
                break;
            default:
                throw new \InvalidArgumentException();
                break;
        }
        $this->value = intval($value);
    }

}