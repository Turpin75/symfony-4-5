<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;
use Twig\Environment;

class CategoryService
{
    private $categoryRepo;
    private $subCategoryRepo;
    private $twig;

    public function __construct(CategoryRepository $categoryRepo, SubCategoryRepository $subCategoryRepo, Environment $twig)
    {
        $this->categoryRepo = $categoryRepo;
        $this->subCategoryRepo = $subCategoryRepo;
        $this->twig = $twig;
    }

    public function getMainCategories()
    {
        $mainCategories = $this->categoryRepo->findBy(['isTopCategory' => TRUE], ['name' => 'ASC']);

        return $mainCategories;
    }

    public function getCategory($category)
    {
        $category = $this->categoryRepo->findOneBy(['name' => $category]);

        return $category;
    }
    public function getAllCategories()
    {
        $allCategories = $this->categoryRepo->findAll();

        return $allCategories;
    }

    public function getSubCategories(Category $category)
    {
        $subCategories = $this->subCategoryRepo->findBy(['category' => $category]);

        return $subCategories;
    }

    public function getSubCategoriesLevel($category, int $level)
    {

        return $subCategories;
    }

}