<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/series', name: 'serie_')]
class SerieController extends AbstractController
{
    #[Route('', name: 'list')]
    public function list(): Response
    {
        return $this->render('serie/list.html.twig', [

        ]);
    }

    #[Route('/detail/{id}', name: 'detail')]
    public function detail($id): Response
    {
        return $this->render('serie/detail.html.twig', [

        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(Request $request): Response
    {

        dump($request);

        return $this->render('serie/create.html.twig', [

        ]);
    }

}
