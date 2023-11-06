<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Factory\AuthorFactory;
use App\Factory\BookFactory;
use App\Factory\LoanFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AuthorFactory::createMany(30);
        BookFactory::createMany(20, function () {
            return [
                'author' => AuthorFactory::randomRange(1, 3),
            ];
        });
        LoanFactory::createMany(10, function () {
            return [
                'books' => BookFactory::randomRange(1, 3),
            ];
        });
    }
}
