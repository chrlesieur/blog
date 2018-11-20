<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 20/11/18
 * Time: 13:57
 */

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article -> setTitle('Framework PHP : Symfony 4');
        $article->setContent('Symfony, un framework ultra puissant');

        $manager-> persist($article);
        $article->setCategory($this->getReference('categorie_0'));
        $manager->flush();

    }
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}