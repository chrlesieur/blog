<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 10/11/18
 * Time: 11:21
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Category;


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
}