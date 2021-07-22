<?php

namespace App\Controller\admin;

use App\Entity\Tuto;
use App\Form\TutoType;
use App\Repository\TutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tutoAdmin", name="tuto_admin")
 */
class TutoAdminController extends AbstractController
{
//    /**
//     * @Route("/", name="_index", methods={"GET"})
//     */
//    public function index(TutoRepository $tutoRepository): Response
//    {
//        return $this->render('tuto/index.html.twig', [
//            'tutos' => $tutoRepository->findAll(),
//        ]);
//    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tuto = new Tuto();
        $form = $this->createForm(TutoType::class, $tuto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tuto);
            $entityManager->flush();

            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tutoAdmin/new.html.twig', [
            'tuto' => $tuto,
            'form' => $form->createView(),
        ]);
    }

//    /**
//     * @Route("/{id}", name="_show", methods={"GET"})
//     */
//    public function show(Tuto $tuto): Response
//    {
//        return $this->render('tuto/show.html.twig', [
//            'tuto' => $tuto,
//        ]);
//    }

    /**
     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tuto $tuto): Response
    {
        $form = $this->createForm(TutoType::class, $tuto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tutoAdmin/edit.html.twig', [
            'tuto' => $tuto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="_delete", methods={"POST"})
     */
    public function delete(Request $request, Tuto $tuto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tuto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tuto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin', [], Response::HTTP_SEE_OTHER);
    }
}
