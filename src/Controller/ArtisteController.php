<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtisteController extends AbstractController
{ 
    /**
     * @Route("/artistes", name="artistes",mathodes={Get})
     */
    public function listeArtistes(artisteRepository $repo): Response
    {
        $artistes=$repo->findAll();
        return $this->render('artiste/listeArtiste.html.twig', [
            'lesArtistes'=> $artistes,
        ]);
    }
}
 