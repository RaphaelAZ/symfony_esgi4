<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 15; $i++) {
            $product = new Product();
            $product->setDescription($faker->sentence);
            $product->setAmount($faker->randomNumber(2));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
