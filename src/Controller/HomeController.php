<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ReviewsRepository;
use App\Repository\RoomsRepository;
use App\Repository\TrainersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(
        private RoomsRepository $roomsRepository,
        private TrainersRepository $trainersRepository,
        private ReviewsRepository $reviewsRepository,
        private CategoryRepository $categoryRepository
    )
    {

    }


    #[Route('/', name: 'app_home')]
    public function index(
    ): Response
    {
        $rooms = $this->roomsRepository->findAll();
        $trainers = $this->trainersRepository->findAll();
        $reviews = $this->reviewsRepository->findAll();
        $category = $this->categoryRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'rooms' => $rooms,
            'trainers' => $trainers,
            'reviews' => $reviews,
            'allCategory' => $category,
        ]);
    }
}
