<?php

namespace App\Controller;

use App\Entity\TypeAffaire;
use App\Form\TypeAffaireType;
use App\Repository\TypeAffaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeaffaire")
 */
class TypeAffaireController extends AbstractController
{
    /**
     * @Route("/", name="type_affaire_index", methods={"GET"})
     */
    public function index(TypeAffaireRepository $typeAffaireRepository): Response
    {
        return $this->render('type_affaire/index.html.twig', [
            'type_affaires' => $typeAffaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_affaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeAffaire = new TypeAffaire();
        $form = $this->createForm(TypeAffaireType::class, $typeAffaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeAffaire);
            $entityManager->flush();

            return $this->redirectToRoute('type_affaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_affaire/new.html.twig', [
            'type_affaire' => $typeAffaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_affaire_show", methods={"GET"})
     */
    public function show(TypeAffaire $typeAffaire): Response
    {
        return $this->render('type_affaire/show.html.twig', [
            'type_affaire' => $typeAffaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_affaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeAffaire $typeAffaire): Response
    {
        $form = $this->createForm(TypeAffaireType::class, $typeAffaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_affaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_affaire/edit.html.twig', [
            'type_affaire' => $typeAffaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_affaire_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeAffaire $typeAffaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeAffaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeAffaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_affaire_index', [], Response::HTTP_SEE_OTHER);
    }
    
}
