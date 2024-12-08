<?php

namespace App\Controller;

use App\Entity\Affaire;
use App\Form\AffaireType;
use App\Repository\AffaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/affaire")
 */
class AffaireController extends AbstractController
{
    /**
     * @Route("/", name="affaire_index", methods={"GET"})
     */
    public function index(AffaireRepository $affaireRepository): Response
    {
        return $this->render('affaire/index.html.twig', [
            'affaires' => $affaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="affaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $affaire = new Affaire();
        $form = $this->createForm(AffaireType::class, $affaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affaire);
            $entityManager->flush();

            return $this->redirectToRoute('affaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('affaire/new.html.twig', [
            'affaire' => $affaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affaire_show", methods={"GET"})
     */
    public function show(Affaire $affaire): Response
    {
        return $this->render('affaire/show.html.twig', [
            'affaire' => $affaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="affaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Affaire $affaire): Response
    {
        $form = $this->createForm(AffaireType::class, $affaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('affaire/edit.html.twig', [
            'affaire' => $affaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Affaire $affaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$affaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($affaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('affaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
