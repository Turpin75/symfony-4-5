<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{
    private $categoryRepo;
    
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function mainCategories()
    {
        $mainCategories = $this->categoryRepo->findBy(['parent' => null], ['name' => 'ASC']);
        return $mainCategories;
    }

}