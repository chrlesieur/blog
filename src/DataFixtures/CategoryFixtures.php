<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19/11/18
 * Time: 21:42
 */

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    private static $categories = [
        'PHP',
        'Ruby',
        'JavaScript',
        'Java',
        'Python'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self:: $categories as $key => $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('categorie_' . $key, $category);
        }
        $manager->flush();
    }
}