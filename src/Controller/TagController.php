<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19/11/18
 * Time: 17:39
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\TagRepository;
use App\Entity\Article;
use App\Entity\Tag;

class TagController extends AbstractController
{
    /**
     *  @Route("/tag/{name}")
     */
    public function showTag(Tag $tag)
    {



        return $this->render('Tag/tag.html.twig', [
            'tag' => $tag, 'articles' => $tag->getArticles()
        ]);
    }
}