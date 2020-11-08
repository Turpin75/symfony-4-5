<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\SubCategoriesRepository;

class CategoryService
{
    private $categoryRepo;
    private $subCategories;
    
    public function __construct(CategoryRepository $categoryRepo, SubCategoriesRepository $subCategoriesRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->subCategoriesRepo = $subCategoriesRepo;
    }

    public function getMainCategories()
    {
        $mainCategories = $this->categoryRepo->findBy(['isTopCategory' => TRUE], ['name' => 'ASC']);

        return $mainCategories;
    }

    public function getSubCategories(Category $category)
    {
        $subCategories = $this->subCategoriesRepo->findBy(['category' => $category]);
        return $subCategories;
    }

}