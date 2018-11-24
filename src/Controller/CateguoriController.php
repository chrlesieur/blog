<?php

namespace App\Controller;

use App\Entity\Categuori;
use App\Form\CateguoriType;
use App\Repository\CateguoriRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categuori")
 */
class CateguoriController extends AbstractController
{
    /**
     * @Route("/", name="categuori_index", methods="GET")
     */
    public function index(CateguoriRepository $categuoriRepository): Response
    {
        return $this->render('categuori/index.html.twig', ['categuoris' => $categuoriRepository->findAll()]);
    }

    /**
     * @Route("/new", name="categuori_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $categuori = new Categuori();
        $form = $this->createForm(CateguoriType::class, $categuori);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categuori);
            $em->flush();

            return $this->redirectToRoute('categuori_index');
        }

        return $this->render('categuori/new.html.twig', [
            'categuori' => $categuori,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categuori_show", methods="GET")
     */
    public function show(Categuori $categuori): Response
    {
        return $this->render('categuori/show.html.twig', ['categuori' => $categuori]);
    }

    /**
     * @Route("/{id}/edit", name="categuori_edit", methods="GET|POST")
     */
    public function edit(Request $request, Categuori $categuori): Response
    {
        $form = $this->createForm(CateguoriType::class, $categuori);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categuori_edit', ['id' => $categuori->getId()]);
        }

        return $this->render('categuori/edit.html.twig', [
            'categuori' => $categuori,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categuori_delete", methods="DELETE")
     */
    public function delete(Request $request, Categuori $categuori): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categuori->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categuori);
            $em->flush();
        }

        return $this->redirectToRoute('categuori_index');
    }
}
