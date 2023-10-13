<?php

namespace App\Controller;

use App\Entity\Label;
use App\Entity\Artiste;
use App\Repository\LabelRepository;
use App\Repository\StyleRepository;
use App\Repository\ArtisteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class LabelsController extends AbstractController
{
    /**
     * @Route("/labels", name="labels", methods={"GET"})
     */
    public function listeLabels(LabelRepository $repo, StyleRepository $style)
    {
        $labels = $repo->findAll();
        $styles = $repo->findAll();

        return $this->render('labels/ListesLabels.html.twig', [
            'lesLabels' => $labels,
            'leStyle' => $styles
        ]);
    }

    /**
     * @Route("/label/{id}", name="ficheLabel", methods={"GET"})
     */
    public function ficheLabel(Label $label, Artiste $artiste)
    {
        return $this->render('labels/ficheLabel.html.twig', [
            'leLabel' => $label,
            'leArtiste' =>$artiste

        ]);
    }


}
