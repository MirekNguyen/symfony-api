<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    #[Route('/')]
    public function homepage(): Response
    {

        dd($_SERVER);
        return new Response('Hello world');
    }
}
