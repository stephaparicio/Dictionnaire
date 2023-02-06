<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Plante;
use App\Entity\Assert\Length;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PlanteFixtures extends Fixture
{

    private Generator $faker;

    public function __construct()
    {
        $this->faker = factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0 ; $i <50; $i++){

            $plante = new Plante();
            $plante->setName($this->faker->word);
            $plante->setPhoto($this->faker->imageUrl());
            $plante->setdescription($this->faker->sentence());
            $plante->setCare($this->faker->word);
            $plante->setSize($this->faker->word);
            $plante->setSun($this->faker->word);
            $plante->setWater($this->faker->word);
            $plante->setCategory($this->getReference('category_' . rand(0,5)));
    
            $manager->persist($plante);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];

    }
}