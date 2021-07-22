<?php

namespace App\Controller;

use App\Entity\Tuto;
use App\Form\TutoType;
use App\Repository\TutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tuto")
 */
class TutoController extends AbstractController
{
    /**
     * @Route("/", name="tuto_index", methods={"GET"})
     */
    public function index(TutoRepository $tutoRepository): Response
    {
        return $this->render('tuto/index.html.twig', [
            'tutos' => $tutoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="tuto_show", methods={"GET"})
     */
    public function show(Tuto $tuto): Response
    {
        return $this->render('tuto/show.html.twig', [
            'tuto' => $tuto,
        ]);
    }
}
