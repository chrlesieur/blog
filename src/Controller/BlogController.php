<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 02/11/18
 * Time: 09:51
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{page}", requirements={"page"="[a-z0-9-]+"}, name="blog_list")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function show($page = "article-du-1-janvier-1970")
    {
        $page = str_replace('-',' ',$page);
        $page = ucwords($page);
        return $this->render('Blog/blog.html.twig', ['page' => $page]);
    }
}