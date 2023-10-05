<?php

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlbumController extends AbstractController
{
    /**
     * @Route("/albums", name="albums",methods={"GET"})
     */
    public function listealbums(AlbumRepository $repo, PaginatorInterface $paginator)
    {
        $albums = $pagination = $paginator->paginate(
            $repo->listeAlbumsComplete(), /* query not result */
            $request->query->getInt('page',1), /* Page number */
            10 /* limit par page */
        );
        return $this->render('album/listeAlbum.html.twig', [
            'lesAlbums'=> $albums
        ]);
    }

     /**
     * @Route("/album/{id}", name="ficheAlbum",methods={"GET"})
     */
    public function fichealbum(Album $album)
    {
        // $album=$repo->findOneById($id);
        return $this->render('album/ficheAlbum.html.twig', [
            'leAlbum'=> $album
        ]);
    }
}
