<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Shorter\UrlShortenerCLI;

#[Route('/shortner')]
class ShortController extends AbstractController
{
    private UrlShortenerCLI $shortenerCLI;

    public function __construct(UrlShortenerCLI $shortenerCLI)
    {

        $this->shortenerCLI = $shortenerCLI;
    }

    #[Route('/{command}', name: 'url_encode')]
    public function shortUrl(Request $request, string $command): Response
    {


        if ($command === 'encode') {
            $url = $request->query->get('url');
            $this->shortenerCLI->handle($command, $url);
            return new Response('URL shortened successfully');

        }else {
            return new Response('Invalid command');
        }
    }

//    #[Route('/{command}', name: 'url_decode')]
//    public function encodeUrl(Request $request, string $command): Response
//    {
//
//
//        if ($command === 'expand') {
//            $url = $request->query->get('url');
//            $this->shortenerCLI->handle($command, $url);
//            return new Response('URL expand successfully');
//
//        }else {
//            return new Response('Invalid command');
//        }
//    }
}
