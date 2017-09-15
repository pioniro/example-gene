<?php

namespace AppBundle\Service;


use AppBundle\Entity\Gamete;
use AppBundle\Entity\Gene;

class CrossProvider
{
    /**
     * @param Gamete[] $gametes1
     * @param Gamete[] $gametes2
     * @return Gene[][]
     */
    public function cross(array $gametes1, array $gametes2): array
    {
        /** @var Gene[][] $genes */
        $genes = [];
        foreach ($gametes1 as $gamete1) {
            foreach ($gametes2 as $gamete2) {
                $gene = [];
                foreach ($gamete1->getAlleles() as $allele1) {
                    foreach ($gamete2->getAlleles() as $allele2) {
                        if(!isset($gene[$allele1 . $allele2]))
                            $gene[$allele1 . $allele2] = Gene::createFromAlleles($allele1, $allele2);
                    }
                }
                $genes[] = array_values($gene);
            }
        }
        return array_values($genes);
    }
}