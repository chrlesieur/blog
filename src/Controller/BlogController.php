<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 02/11/18
 * Time: 09:51
 */

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ArticleSearchType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CategoryRepository;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{page}", requirements={"page"="[a-z0-9-]+"}, name="blog_list")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show($page = "article-du-1-janvier-1970")
    {
        $page = str_replace('-', ' ', $page);
        $page = ucwords($page);
        return $this->render('Blog/blog.html.twig', ['page' => $page]);
    }
    /**
     * @Route("/blog/", name="blog_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function index(ArticleRepository $articles)
    {

        $form = $this->createForm(
            ArticleSearchType::class,
            null,
            ['method' => Request::METHOD_GET]
        );

        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }

        return $this->render('Blog/index.html.twig', [
                'articles' => $articles -> findAll(),
                'form' => $form->createView(),
            ]
        );
    }
    /**
     *  @Route("/category/{category}", name="blog_show_category"))
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showByCategory(string $category)
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name'=>$category]);
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['category' => $category],['id'=>'DESC'],
                3,
                0
            );
        return $this->render('Blog/category.html.twig', [
            'category' => $category, 'articles' => $articles
        ]);
    }
}



