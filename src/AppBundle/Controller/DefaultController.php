<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Attribute;
use AppBundle\Entity\Gene;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/table", name="table")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function tableAction(Request $request)
    {
        $inputGenes = [Gene::Aa, Gene::aA, Gene::aA, Gene::aA];
        $attribute = new Attribute(count($inputGenes));
        foreach ($inputGenes as $gene) {
            $attribute->addGenes(new Gene($gene));
        }
        $gameteProvider = $this->get('app.gamete_provider');
        $crossProvider = $this->get('app.cross_provider');
        $gametes = $gameteProvider->getGametes($attribute->getGenes());
        $variants = array_chunk($crossProvider->cross($gametes, $gametes), count($gametes));
        return $this->render('default/table.html.twig', compact('gametes', 'variants'));
    }
}