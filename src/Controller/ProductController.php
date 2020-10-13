<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function index(EntityManagerInterface $em, ProductRepository $productRepo)
    {
        
        $product = new Product;
        $product->setName('Keyboard')->setPrice(1999)->setDescription('Ergonomic and stylish!');

        $em->persist($product);
        $em->flush();

        return $this->render('product/index.html.twig', ['product' => $product]);
    }

}
