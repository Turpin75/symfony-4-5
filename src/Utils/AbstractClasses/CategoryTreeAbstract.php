<?php

namespace App\Utils\AbstractClasses;

use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class CategoryTreeAbstract
{
    private $categoryRepo;
    private $urlGenerator;
    private $categoriesArrayFromDb;
    
    public function __construct(CategoryRepository $categoryRepo, UrlGeneratorInterface $urlGenerator)
    {
        $this->categoryRepo = $categoryRepo;
        $this->urlGenerator = $urlGenerator;
        $this->categoriesArrayFromDb = $this->getCategories();
    }

    abstract public function getCategoryList(array $categories_array);

    public function buildTree(int $parent_id = null)
    {
        $subCategory = [];

        foreach($this->categoriesArrayFromDb as $category)
        {
            if($category->getParent() !== null)
            {
                dump($category->getParent());
            }
            
           /*  if($category['parent_id'] == $parent_id)
            {
                $children = $this->buildTree($category['id']);

                if($children)
                {
                    $category['children'] = $children;
                }

                $subCategory[] = $category;
            } */
        }

        return $subCategory;
    }

    private function getCategories(): array
    {
        return $this->categoryRepo->findAll();
    }


}