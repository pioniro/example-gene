<?php

namespace AppBundle\Entity;


class Allele
{
    const a = 0;
    const A = 1;

    /**
     * @var int self::a | self::A
     */
    protected $value;

    /**
     * Allele constructor.
     * @param int $value
     */
    public function __construct($value)
    {
        if(!in_array($value, [self::a, self::A]))
            throw new \InvalidArgumentException();
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    function __toString()
    {
        switch($this->value){
            case self::a:
                return 'a';
            case self::A:
                return 'A';
        }
    }


}