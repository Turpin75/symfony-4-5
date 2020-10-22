<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $this->loadMainCategories($manager);
      $this->loadElectronics($manager);
    }

    private function loadMainCategories($manager)
    {
        foreach($this->getMainCategoriesData() as $name)
       {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
       }

        $manager->flush();
    }

    private function loadElectronics($manager)
    {
        foreach($this->getElectronicsData() as $name)
       {
            $parent = $manager->getRepository(Category::class)->findOneBy(['name' => 'Electronics']);
            $category = new Category();
            $category->setName($name);
            $category->setParent($parent);
            $manager->persist($category);
       }

        $manager->flush();
    }

    private function getMainCategoriesData()
    {
       return ['Electronics', 'Toys', 'Books', 'Movies']; 
    }

    private function getElectronicsData()
    {
       return ['Cameras', 'Computers', 'Cell Phones'];
    }

}
