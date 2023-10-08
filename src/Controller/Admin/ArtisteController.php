<?php

namespace App\Controller\Admin;

use App\Entity\Artiste;
use App\Form\ArtisteType;
use App\Repository\ArtisteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtisteController extends AbstractController
{
     /**
     * @Route("admin/artiste", name="admin_artistes",methods={"GET"})
     */
    public function listeArtistes(ArtisteRepository $repo, PaginatorInterface $paginator,Request $request)
    {
        $artistes=$paginator->paginate(
            $repo->listeArtistesCompletePaginee(),
            $request->query->getInt('page',1),
            9
        );
        return $this->render('admin/artiste/listeArtistes.html.twig', [
            'lesArtistes'=> $artistes
        ]);

    }
     /**
     * @Route("admin/artisteajout", name="admin_artistes_ajout",methods={"GET"})
     */
    // problème avec la méthode post et la version php 8
    public function ajoutArtiste()
    {
        $artiste=new Artiste();
        $form=$this->createForm(ArtisteType::class, $artiste);
        return $this->render('admin/artiste/formAjoutArtiste.html.twig', [
            'formArtiste'=> $form->createView()
        ]);

    }
}
