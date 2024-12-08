<?php

namespace App\Controller;

use App\Entity\DateRDV;
use App\Form\DateRDVType;
use App\Repository\DateRDVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rdv")
 */
class DateRDVController extends AbstractController
{
    /**
     * @Route("/", name="date_r_d_v_index", methods={"GET"})
     */
    public function index(DateRDVRepository $dateRDVRepository): Response
    {
        return $this->render('date_rdv/index.html.twig', [
            'date_r_d_vs' => $dateRDVRepository->findAll(),
        ]);
    }

    /**
     * @Route("/index2", name="index2", methods={"GET"})
     */
    public function index2(DateRDVRepository $dateRDVRepository): Response
    {
        return $this->render('date_rdv/index.html copy.twig', [
            'date_r_d_vs' => $dateRDVRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="date_r_d_v_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dateRDV = new DateRDV();
        $form = $this->createForm(DateRDVType::class, $dateRDV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dateRDV);
            $entityManager->flush();

            return $this->redirectToRoute('date_r_d_v_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('date_rdv/new.html.twig', [
            'date_r_d_v' => $dateRDV,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="date_r_d_v_show", methods={"GET"})
     */
    public function show(DateRDV $dateRDV): Response
    {
        return $this->render('date_rdv/show.html.twig', [
            'date_r_d_v' => $dateRDV,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="date_r_d_v_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DateRDV $dateRDV): Response
    {
        $form = $this->createForm(DateRDVType::class, $dateRDV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('date_r_d_v_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('date_rdv/edit.html.twig', [
            'date_r_d_v' => $dateRDV,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="date_r_d_v_delete", methods={"POST"})
     */
    public function delete(Request $request, DateRDV $dateRDV): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dateRDV->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dateRDV);
            $entityManager->flush();
        }

        return $this->redirectToRoute('date_r_d_v_index', [], Response::HTTP_SEE_OTHER);
    }
}
