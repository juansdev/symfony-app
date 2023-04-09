<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'getUsers')]
    public function index(EntityManagerInterface $em): Response {
        $users = $em->getRepository(User::class)->findBy([], ['name' => 'ASC']);
        return $this->render('user/users.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/user/create', name: 'createUser')]
    public function createUser(EntityManagerInterface $em, Request $request): Response {
        $user = new User();
        $form_user = $this->createForm(UserType::class, $user);
        $form_user->handleRequest($request);
        if ($form_user->isSubmitted() && $form_user->isValid()) {
            $user->setStatus(1);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('getUsers');
        }
        return $this->render('user/create.html.twig', [
            'form_user' => $form_user->createView()
        ]);
    }

    #[Route('/user/update/{id}', name: 'updateUser')]
    public function updateUser(EntityManagerInterface $em, Request $request, User $user): Response {
        $form_user = $this->createForm(UserType::class, $user);
        $form_user->handleRequest($request);
        if ($form_user->isSubmitted() && $form_user->isValid()) {
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('getUsers');
        }
        return $this->render('user/update.html.twig', [
            'form_user' => $form_user->createView()
        ]);
    }

    #[Route('/user/delete/{id}', name: 'toggleStatusUser')]
    public function toggleStatusUser(EntityManagerInterface $em, User $user): Response {
        $user->setStatus(!$user->getStatus());
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('getUsers');
    }
}
