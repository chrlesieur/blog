<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 12/11/18
 * Time: 17:17
 */

namespace App\Controller;

use App\Form\ArticleType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CategoryType;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function index(ArticleRepository $articles, Request $request)
    {

        $article = new Article();
        $form = $this->createForm(
            ArticleType::class,
            null,
            ['method' => Request::METHOD_POST]
        );
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
        }


        return $this->render('Article/index.html.twig', [
                'articles' => $articles->findAll(),
                'form' => $form->createView(),
            ]
        );
    }
}