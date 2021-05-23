<?php

namespace App\DataFixtures;

use App\Entity\Departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DepartementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $array = array(
            array(
                "nom" => "direction",
                "email" => "ousmanemoussathiam@gmail.com",

            ),
            array(
                "nom" => "rh",
                "email" => "ousmanemoussathiam@yahoo.fr",

            ),
            array(
                "nom" => "Dev",
                "email" => "arounabathily01@yahoo.com",

            ),
            array(
                "nom" => "Com",
                "email" => "amiousmane.thiam@gmail.com",

            )
        );

        foreach($array as $value) {
                    $departement= new Departement();
                    $departement->setNom($value['nom'] )
                        ->setEmail($value['email']);
                    $manager->persist($departement);

        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
