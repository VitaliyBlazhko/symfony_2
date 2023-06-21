<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    public function string()
    {
        $text = 'Hello World';
        return new Response($text);


    }
    #[Route('/numb', name: 'app_numb')]
    public function number()
    {
        $numb = random_int(0, 1000);
        return new Response($numb);


    }
    #[Route('/test', name: 'app_test')]
    public function test()
    {
        $text = 'OK';
        return new Response($text);


    }
}
