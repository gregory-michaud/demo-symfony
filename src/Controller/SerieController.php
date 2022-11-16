<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Repository\SerieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/series', name: 'serie_')]
class SerieController extends AbstractController
{
    #[Route('', name: 'list')]
    public function list(SerieRepository $serieRepository): Response
    {

        $series = $serieRepository->findBestSeries();


        return $this->render('serie/list.html.twig', [
            "series" => $series
        ]);
    }

    #[Route('/detail/{id}', name: 'detail')]
    public function detail($id, SerieRepository $serieRepository): Response
    {
        $serie = $serieRepository->find($id);
        return $this->render('serie/detail.html.twig', [
            "serie" => $serie
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(Request $request): Response
    {

        dump($request);

        return $this->render('serie/create.html.twig', [

        ]);
    }

    #[Route('/demo', name: 'em-demo')]
    public function demo(EntityManagerInterface $entityManager): Response
    {

        $serie = new Serie();

        $serie->setName('pif');
        $serie->setBackdrop('azert');
        $serie->setPoster('azert');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime('-1 year'));
        $serie->setLastAirDate(new \DateTime('-6 months'));
        $serie->setGenre('SF');
        $serie->setOverview('azerty');
        $serie->setPopularity(123.08);
        $serie->setVote(8.2);
        $serie->setStatus('Cancelled');
        $serie->setTmdbId(123456789);

        dump($serie);

        $entityManager->persist($serie);
        $entityManager->flush();

        dump($serie);

        $serie->setGenre('Comedy');
        $entityManager->flush();

        return $this->render('serie/create.html.twig', [

        ]);
    }

}
