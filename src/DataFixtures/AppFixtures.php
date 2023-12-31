<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Factory\AuthorFactory;
use App\Factory\BookFactory;
use App\Factory\LibraryFactory;
use App\Factory\LoanFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AuthorFactory::createMany(30);
        UserFactory::createMany(20);
        BookFactory::createMany(50, function () {
            return [
                'author' => AuthorFactory::randomRange(1, 3),
            ];
        });
        LibraryFactory::createMany(5, function () {
            return [
                'books' => BookFactory::randomRange(1, 10),
            ];
        });
        LoanFactory::createMany(30, function () {
            return [
                'books' => BookFactory::randomRange(1, 3),
                'library' => LibraryFactory::random(),
                'borrower' => UserFactory::random(),
            ];
        });
    }
}
