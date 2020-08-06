<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Product;
use Symfony\Component\Validator\Validator\ValidatorInterface;
/* use Doctrine\ORM\EntityManagerInterface; */

/**
 * Class: ProductController
 *
 * @see AbstractController
 */
class ProductController extends AbstractController
{
    /**
     * createProduct
     *
     */
    public function createProduct(ValidatorInterface $validator)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('keyboard');
        $product->setPrice(29000);
        $product->setDescription('Keyboard RGB');

        if($error = $validator->validate($product)) {
            $this->createException($error);
        }

        $entityManager->persist($product);
        $entityManager->flush();
        return $product;
    }
    /**
     * view
     *
     */
    public function view($id)
    {
        /* $product = $this->createProduct(); */
        $entityManager = $this->getDoctrine()->getRepository(Product::class);

        $product = $entityManager->findOneBy(['id' => $id]);
        $allProduct = $entityManager->findAll();
        var_dump($allProduct);

        if(!$product) {
            $this->createNotFoundException('No product found for' . $id);
        }

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product_id' => $product->getId(),
            'product_name' => $product->getName(),
            'product_description' => $product->getDescription(),
        ]);
    }
}
