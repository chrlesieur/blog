<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 20/11/18
 * Time: 16:01
 */

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Category;


class FakerFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');



        for ($a=0; $a < 5; $a++) {
            for ($i = 0; $i < 10; $i++) {
                $article = new Article();
                $article->setTitle(mb_strtolower($faker->sentence()));
                $article->setContent($faker->text);
                $article->setCategory($this->getReference('categorie_'.$a));
                $manager->persist($article);
            }
        }
            $manager->flush();

    }
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}