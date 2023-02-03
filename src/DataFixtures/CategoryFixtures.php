<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Category;
use App\Entity\Assert\Length;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class CategoryFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0 ; $i <20; $i++){

        
        $category = new Category();
        $category->setName($this->faker->word);
        $category->setPhoto($this->faker->imageUrl());
        $category->setdescription($this->faker->sentence());
        $this->addReference('category_' . $i, $category);
    

        $manager->persist($category);
    }

    $manager->flush();
}
}