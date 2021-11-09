<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

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
    public function createProduct(
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager
    )
    {

        $product = new Product();
        $product->setName('keyboard');
        $product->setPrice(49000);
        $product->setDescription('Elegant keyboard');
        $product->setColor('white');

        if (!$error = $validator->validate($product)) {
            throw new ServiceUnavailableHttpException($error);
        }

        $entityManager->persist($product);
        $entityManager->flush();
        return $product;
    }
    /**
     * view
     *
     */
    public function view(
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager,
        $id
    ): Response
    {
        // $product = $this->createProduct($validator, $entityManager);
        $productRepository = $entityManager->getRepository(Product::class);

        $product = $productRepository->findOneBy(['id' => $id]);
        // $allProduct = $productRepository->findAll();
        // var_dump($allProduct);

        if (!$product) {
            throw new NotFoundHttpException('No product found for ' . $id);
        }

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product_id' => $product->getId(),
            'product_name' => $product->getName(),
            'product_description' => $product->getDescription(),
            'product_color' => $product->getColor(),
            'product_price' => $product->getPrice(),
        ]);
    }
}
