<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\SubCategory;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $this->loadTopCategories($manager);
      $this->loadCategories($manager);
      $this->loadSubCategories($manager, 'Electronics');
      $this->loadSubCategories($manager, 'Computers');
      $this->loadSubCategories($manager, 'Laptops');
      $this->loadSubCategories($manager, 'Books');
      $this->loadSubCategories($manager, 'Movies');
      $this->loadSubCategories($manager, 'Romance');
    }

    private function loadTopCategories($manager)
    {
        foreach($this->getTopCategoriesData() as $name)
       {
            $topCategory = new Category;
            $topCategory->setName($name);
            $topCategory->setIsTopCategory(TRUE);
            $manager->persist($topCategory);
       }

        $manager->flush();
    }

    private function loadCategories($manager)
    {
        foreach($this->getCategoriesData() as $name)
       {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
       }

        $manager->flush();
    }

    public function loadSubCategories($manager, $categoryName)
    {

        $category = $manager->getRepository(Category::class)->findOneBy(['name' => $categoryName]);

        $methodName = "get{$categoryName}Data";

        foreach($this->$methodName() as $name)
        {
            $subCategory = new SubCategory;
            $subCategory->setName($name);
            $category->addSubCategory($subCategory);
            $manager->persist($subCategory);
        }

        $manager->flush();
    }

    private function getTopCategoriesData()
    {
        return [
            'Electronics', 'Toys', 'Books', 'Movies'
        ];
    }

    private function getCategoriesData()
    {
        return [
            'Cameras', 'Computers', 'Cell Phones',
            'Laptops', 'Desktops',
            'Apple', 'Asus', 'Dell', 'Lenovo', 'HP',
            'Children', 'Kindle eBooks', 'Family', 'Romance',
            'Romantic Comedy', 'Romantic Drama'
        ];
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
