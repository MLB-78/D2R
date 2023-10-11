<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StyleController extends AbstractController
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

    //  /**
    //  * @Route("admin/artiste/ajout", name="admin_artistes_ajout",methods={"GET","POST"})
    //  * @Route("admin/artiste/modif{id}", name="admin_artistes_modif",methods={"GET","POST"})
    //  */
    // public function ajoutModifArtiste(Artiste $artiste=null, Request $request, EntityManagerInterface $manager)
    // {
    //     if($artiste == null){
    //         $artiste=new Artiste();
    //         $mode = 'ajouté';
    //     } else {
    //         $mode = 'modifié';
    //     }
    //     $form=$this->createForm(ArtisteType::class, $artiste);
    //     $form->handleRequest($request);
    //     if($form->isSubmitted() && $form->isValid()) 
    //     {
    //         $manager->persist($artiste);
    //         $manager->flush();
    //         $this->addFlash("success","L'artiste a bien été $mode");
    //         return $this->redirectToRoute('admin_artistes');
    //     }
    //     return $this->render('admin/artiste/formAjoutModifArtiste.html.twig', [
    //         'formArtiste'=> $form->createView()
    //     ]);

    // }
    //  /**
    //  * @Route("admin/artiste/supression/{id}", name="admin_artistes_suppression",methods={"GET"})
    //  */
    // public function suppressionArtiste(Artiste $artiste,  EntityManagerInterface $manager)
    // {
      
    //     $manager->remove($artiste);
    //     $manager->flush();
    //     $this->addFlash("success","L'artiste a bien été supprimé");
    //     return $this->redirectToRoute('admin_artistes');
    
    // }

}
