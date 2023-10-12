<?php

namespace App\Controller;

use App\Entity\Label;
use App\Repository\LabelRepository;
use App\Repository\ArtisteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LabelsController extends AbstractController
{
    /**
     * @Route("/labels", name="labels", methods={"GET"})
     */
    public function listeLabels(LabelRepository $repo)
    {
        $labels = $repo->findAll();

        return $this->render('labels/ListesLabels.html.twig', [
            'lesLabels' => $labels
        ]);
    }

    /**
     * @Route("/label/{id}", name="ficheLabel", methods={"GET"})
     */
    public function ficheLabel(Label $artiste)
    {
        return $this->render('labels/ficheLabel.html.twig', [
            'leLabel' => $artiste
        ]);
    }


}
