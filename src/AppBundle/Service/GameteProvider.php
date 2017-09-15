<?php

namespace AppBundle\Service;


use AppBundle\Entity\Gamete;
use AppBundle\Entity\Gene;

class GameteProvider
{
    /**
     * @param Gene[] $genes
     * @return Gamete[]
     */
    public function getGametes(array $genes): array
    {
        /** @var Gamete[] $gametes */
        $gametes = [];
        if (count($genes) > 2) {
            foreach ($genes[0]->getAlleles() as $allele) {
                foreach ($this->getGametes(array_slice($genes, 1)) as $gamete) {
                    $gamete->addAlleles($allele);
                    $gametes[] = $gamete;
                }
            }
        } elseif(count($genes) === 2) {
            foreach ($genes[0]->getAlleles() as $allele1) {
                foreach ($genes[1]->getAlleles() as $allele2) {
                    $gamete = new Gamete();
                    $gamete->addAlleles($allele1);
                    $gamete->addAlleles($allele2);
                    $gametes[] = $gamete;
                }
            }
        } else {
            foreach ($genes[0]->getAlleles() as $allele) {
                $gamete = new Gamete();
                $gamete->addAlleles($allele);
            }
        }
        return $gametes;
    }
}