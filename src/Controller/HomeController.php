<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 29/10/18
 * Time: 12:51
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $welcome = 'Hello WCS';
        return $this->render('home.html.twig', [
            'welcome' => $welcome,
        ]);
    }
}