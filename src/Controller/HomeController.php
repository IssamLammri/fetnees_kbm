<?php

namespace App\Controller;

use App\Repository\RoomsRepository;
use App\Repository\TrainersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(
        private RoomsRepository $roomsRepository,
        private TrainersRepository $trainersRepository
    )
    {

    }


    #[Route('/', name: 'app_home')]
    public function index(
    ): Response
    {
        $rooms = $this->roomsRepository->findAll();
        $trainers = $this->trainersRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'rooms' => $rooms,
            'trainers' => $trainers,
        ]);
    }
}
