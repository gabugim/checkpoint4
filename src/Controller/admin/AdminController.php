<?php

namespace App\Controller\admin;

use App\Repository\CategoryRepository;
use App\Repository\TutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(CategoryRepository $categoryRepository, TutoRepository $tutoRepository): Response
    {
        $categories = $categoryRepository->findAll();
        $tutos = $tutoRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'categories' => $categories,
            'tutos' => $tutos,
        ]);
    }
}
