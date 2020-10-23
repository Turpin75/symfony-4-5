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
      $this->loadSubCategories($manager, 'Electronics');
      $this->loadSubCategories($manager, 'Computers');
      $this->loadSubCategories($manager, 'Laptops');
      $this->loadSubCategories($manager, 'Books');
      $this->loadSubCategories($manager, 'Movies');
      $this->loadSubCategories($manager, 'Romance');
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

    public function loadSubCategories($manager, $category)
    {

        $parent = $manager->getRepository(Category::class)->findOneBy(['name' => $category]);
        $methodName = "get{$category}Data";
        foreach($this->$methodName() as $name)
        {
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
    private function getComputersData()
    {
        return ['Laptops', 'Desktops'];
    }

    private function getLaptopsData()
    {
        return ['Apple', 'Asus', 'Dell', 'Lenovo', 'HP'];
    }

    private function getBooksData()
    {
        return ['Children', 'Kindle eBooks'];
    }

    private function getMoviesData()
    {
        return ['Family', 'Romance'];
    }

    private function getRomanceData()
    {
        return ['Romantic Comedy', 'Romantic Drama'];
    }



}
