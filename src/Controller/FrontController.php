<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\User;
use App\Form\UserType;

class FrontController extends AbstractController
{
    #[Route('/', name: 'app_front', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $datas = [];
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $datas = $form->getData();

        }
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'form' => $form,
            'datas' => $datas
        ]);
    }
    #[Route('/success', name: 'task_success')]
    public function success(): Response
    {
        return new Response("Success!");
    }
}
