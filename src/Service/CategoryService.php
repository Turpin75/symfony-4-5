<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;

class CategoryService
{
    private $categoryRepo;
    private $subCategoryRepo;

    public function __construct(CategoryRepository $categoryRepo, SubCategoryRepository $subCategoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->subCategoryRepo = $subCategoryRepo;
    }

    public function getMainCategories()
    {
        $mainCategories = $this->categoryRepo->findBy(['isTopCategory' => TRUE], ['name' => 'ASC']);

        return $mainCategories;
    }

    public function getSubCategories(Category $category)
    {
        $subCategories = $this->subCategoryRepo->findBy(['category' => $category]);

        return $subCategories;
    }

    public function getAllSubCategories($category)
    {

    }

}