<?php

namespace App\DataFixtures;
use App\DataFixtures\ArtistFixtures;
use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use  App\Entity\Groups;

class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ///groupRepository = $manager->getRepository(Artist::class); // ici Artist c'est l'entité Artist , but eto recuperer artiste 1 prc groupe tsy maintsy mila artiste 
        // $product = new Product();
        // $manager->persist($product);

        $group1 = new Groups;

        $group1->setName("Caloe");
        $group1->setDescription("Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles,");
        $group1->setDateCreatedGroup(new \DateTime());
        $group1->addArtist($this->getReference("artisteActuel_1"));
        $group1->addArtist($this->getReference("artisteActuel_2"));

        $manager->persist($group1);

        $manager->flush();
    }

    public function getDependencies(){ //liste tous les dependances de fixtures à lancer avant la classe courante ici GroupFixtures

        return [
            ArtistFixtures::class,
        ];
    }
}

