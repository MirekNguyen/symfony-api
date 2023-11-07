<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Browser\Test\HasBrowser;

class BookTest extends KernelTestCase
{
    use HasBrowser;

    public function testGetCollectionOfBooks(): void
    {
        $this->browser()
            ->get("/books")
            ->dump();
    }
}
