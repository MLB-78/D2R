<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Album;
use App\Entity\Label;
use App\Repository\AlbumRepository;
use App\Repository\LabelRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class majFixtures extends Fixture
{
    private $albumRepo;
    public function __construct(AlbumRepository $albumRepo, LabelRepository $labelRepo){
        $this->albumRepo=$albumRepo;
        $this->labelRepo=$labelRepo;
    }
    
    public function load(ObjectManager $manager): void{


        $lesLabels=$this->labelRepo->findAll();
        $i=0;
        foreach ($lesLabels as $label) {

                $this->addReference("label".$i, $label);
                $i++;
        }
    $lesAlbums=$this->albumRepo->findAll();
    foreach ($lesAlbums as $album) {
        $album  ->setLabel($this->getReference("label".mt_rand(0,$i-1)));
    }
    $manager->flush();
    }

}
