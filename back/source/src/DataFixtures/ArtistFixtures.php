<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $artist1 = new Artist; // eto le Artist le ao am entité , mi creer objet 
        $artist1->setName("Norah Jones"); // on utilise setName ici pour ajouter le nom de l'artiste
        $artist1->setRole("Vocal"); 

        $manager->persist($artist1);

        $artist2 = new Artist;
        $artist2->setName("Emma Chest");
        $artist2->setRole("Choriste");

        $manager->persist($artist2);

        $artist3 = new Artist;
        $artist3->setName("Georges Granville");
        $artist3->setRole("guitariste");

        $manager->persist($artist3);

        $artist4 = new Artist;
        $artist4->setName("Michel Alibo");
        $artist4->setRole("Batterie");

        $manager->persist($artist4);

        $artist5 = new Artist;
        $artist5->setName("Arnaud Dolmen");
        $artist5->setRole("Bassiste");

        $manager->persist($artist5);

        $artist6 = new Artist;
        $artist6->setName("Laura Prince");
        $artist6->setRole("Piano");

        $manager->persist($artist6);

 

        $manager->flush();
        $this->addReference("artisteActuel_1",$artist2); // miajouter reference mba afahako mampiasa an le artiste any anaty groupe 
        $this->addReference("artisteActuel_2",$artist3);
    }
}
