<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlbumController extends AbstractController
{
    /**
     * @Route("/albums", name="albums",methods={"GET"})
     */
    public function listealbums(AlbumRepository $repo)
    {
        $albums=$repo->findAll();
        return $this->render('album/listeAlbum.html.twig', [
            'lesAlbums'=> $albums
        ]);
    }

     /**
     * @Route("/album/{id}", name="ficheAlbum",methods={"GET"})
     */
    public function fichealbum(album $album)
    {
        // $album=$repo->findOneById($id);
        return $this->render('album/ficheAlbum.html.twig', [
            'leAlbum'=> $album
        ]);
    }
}
