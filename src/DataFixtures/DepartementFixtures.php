<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DepartementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $array = array('direction', 'rh', 'com','dev');
        $taille=sizeof($array);
        foreach ($array as $value){
            $departement= new Departement();
            $departement->setNom("$value")
                ->setEmail("ousmanemoussathiam@yahoo.fr");
            $manager->persist($departement);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
