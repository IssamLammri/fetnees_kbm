<?php

namespace App\Controller;

use App\Entity\Trainers;
use App\Form\TrainersType;
use App\Repository\TrainersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/trainers')]
class TrainersController extends AbstractController
{
    #[Route('/', name: 'app_trainers_index', methods: ['GET'])]
    public function index(TrainersRepository $trainersRepository): Response
    {
        return $this->render('trainers/index.html.twig', [
            'trainers' => $trainersRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_trainers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TrainersRepository $trainersRepository): Response
    {
        $trainer = new Trainers();
        $form = $this->createForm(TrainersType::class, $trainer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trainersRepository->save($trainer, true);

            return $this->redirectToRoute('app_trainers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('trainers/new.html.twig', [
            'trainer' => $trainer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_trainers_show', methods: ['GET'])]
    public function show(Trainers $trainer): Response
    {
        return $this->render('trainers/show.html.twig', [
            'trainer' => $trainer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_trainers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Trainers $trainer, TrainersRepository $trainersRepository): Response
    {
        $form = $this->createForm(TrainersType::class, $trainer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trainersRepository->save($trainer, true);

            return $this->redirectToRoute('app_trainers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('trainers/edit.html.twig', [
            'trainer' => $trainer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_trainers_delete', methods: ['POST'])]
    public function delete(Request $request, Trainers $trainer, TrainersRepository $trainersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trainer->getId(), $request->request->get('_token'))) {
            $trainersRepository->remove($trainer, true);
        }

        return $this->redirectToRoute('app_trainers_index', [], Response::HTTP_SEE_OTHER);
    }
}
