<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Album;
use App\Entity\Label;
use App\Entity\Style;
use App\Entity\Artiste;
use App\Entity\Morceau;
use App\Repository\AlbumRepository;
use App\Repository\StyleRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private $repo;
    private $repoStyle;
    
    public function __construct(AlbumRepository $repository, StyleRepository $repostyle)
    {
        $this->repo=$repository;
        $this->repoStyle=$repostyle;
    }
    public function load(ObjectManager $manager): void
    {

        // Génère une URL d'image aléatoire à partir d'Unsplash
        function getRandomUnsplashImageUrl() {
           
            $query = urlencode("trap"); // Remplacez "your_search_query_here" par votre propre requête de recherche

            // Construire l'URL d'Unsplash avec les paramètres aléatoires
            $unsplashUrl = "https://source.unsplash.com/random?{$query}";

            return $unsplashUrl;
        }


        $faker = Factory::create();
        // $styles=$this->repoStyle->findAll();
        // foreach ($styles as $style) {
        //     $this->addReference('style' . $style->getId(), $style);
        // }

        // $albums=$this->repo->findAll();
        // foreach($albums as $album)
        // {
        //  $album->addStyle($this->getReference("style" . mt_rand(1,17)));
        //  $manager->persist($album);
        // }
        // $manager->flush();
    

        // // Artiste
        $lesArtistes=$this->chargeFichier('artiste.csv');
        $genres=["men","women"];
        foreach ($lesArtistes as $value) {
            $artiste=new Artiste();
            $artiste    ->setId(intval($value[0]))
                        ->setNom($value[1])
                        ->setDescription("<p>". join("</p><p>",$faker->paragraphs(5)) ."</p>")
                        ->setSite($faker->url())
                        ->setImage('https:randomuser.me/api/portraits/'.$faker->randomElement($genres)."/".mt_rand(1,99).".jpg")
                        ->setType($value[2]);
            $manager->persist($artiste);
            // $manager->flush();
            // dump($artiste->getId());
            $this->addReference("artiste".intval($value[0]),$artiste);
        }

        // Album
        $lesAlbums = $this->chargeFichier('album.csv');
        foreach ($lesAlbums as $value) {
            $album = new Album();
            $album
                ->setId(intval($value[0]))
                ->setNom($value[1])
                ->setDate(intval($value[2]))
                ->setImage(getRandomUnsplashImageUrl())
                // ->addStyle($this->getReference("style" . $value[3]))
                ->setArtiste($this->getReference("artiste" . $value[4]));
            $manager->persist($album);
            $manager->flush();
            // $this->addReference('album' . intval($value[0]), $album);
        }
        


        // // Morceaux
        // $lesMorceaux=$this->chargeFichier('morceau.csv');
        // foreach($lesMorceaux as $value){
        //     $morceau = new Morceau();
        //     $morceau ->setId(intval($value[0]))
        //            ->setTitre($value[2])  
        //            ->setAlbum($this->getReference("album".$value[1]))
        //            ->setPiste(intval($value[4]))
        //            ->setDuree(date('i:s',$value[3]));
        //         $manager->persist($morceau);
        //         $manager->flush();
    
        //     }
    }   
    // Pour charger les fichier csv
    public function chargeFichier($fichier){
        
        $fichierCsv=fopen(__DIR__."/".$fichier,"r");
        while(!feof($fichierCsv)){
            $data[]=fgetcsv($fichierCsv);
        }
        fclose($fichierCsv);
        return $data;

    }

}


