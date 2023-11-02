<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle("Hello");
        $book->setDescription("from Fixture");
        $manager->persist($book);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
