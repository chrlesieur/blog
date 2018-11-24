<?php

namespace App\Controller;

use App\Entity\Tague;
use App\Form\TagueType;
use App\Repository\TagueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tague")
 */
class TagueController extends AbstractController
{
    /**
     * @Route("/", name="tague_index", methods="GET")
     */
    public function index(TagueRepository $tagueRepository): Response
    {
        return $this->render('tague/index.html.twig', ['tagues' => $tagueRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tague_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $tague = new Tague();
        $form = $this->createForm(TagueType::class, $tague);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tague);
            $em->flush();

            return $this->redirectToRoute('tague_index');
        }

        return $this->render('tague/new.html.twig', [
            'tague' => $tague,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tague_show", methods="GET")
     */
    public function show(Tague $tague): Response
    {
        return $this->render('tague/show.html.twig', ['tague' => $tague]);
    }

    /**
     * @Route("/{id}/edit", name="tague_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tague $tague): Response
    {
        $form = $this->createForm(TagueType::class, $tague);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tague_edit', ['id' => $tague->getId()]);
        }

        return $this->render('tague/edit.html.twig', [
            'tague' => $tague,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tague_delete", methods="DELETE")
     */
    public function delete(Request $request, Tague $tague): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tague->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tague);
            $em->flush();
        }

        return $this->redirectToRoute('tague_index');
    }
}
