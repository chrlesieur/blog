<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 10/11/18
 * Time: 11:21
 */

namespace App\Controller;

use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;


class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}")
     */
    public function show(Category $category)
    {
        {
            return $this->render('category.html.twig', ['category' => $category->getName(), 'articles'=> $category->getArticles()]);
        }
    }
    /**
     * @Route("/showCategory/{id}", name="category_show")
     */
    public function showCategory(Category $category)
    {
        {
            return $this->render('showCategory.html.twig', ['category'=>$category->getName()]);
        }
    }
    /**
     * @Route("/category/", name="category_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function index(CategoryRepository $categories, Request $request)
    {

        $category = new Category();
        $form = $this->createForm(
            CategoryType::class,
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



        return $this->render('Category/index.html.twig', [
                'categories'=>$categories ->findAll(),
                'category' => $category -> getName(),
                'form' => $form->createView(),
            ]
        );
    }

}