<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\SubCategoriesRepository;

class SubCategoriesService
{
    private $subCategoriesRepo;
    
    public function __construct(SubCategoriesRepository $subCategoriesRepo)
    {
        $this->subCategoriesRepo = $subCategoriesRepo;
    }

    public function getSubCategories()
    {
       return $this->subCategoriesRepo->findAll();
    }

    public function findSubCategoriesByCategory(Category $category)
    {
        
    }
}