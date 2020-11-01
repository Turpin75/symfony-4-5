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

    private function getCategories(): array
    {
        return $this->categoryRepo->findAll();
    }


}