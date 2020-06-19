<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        # template/     home.html.twig
        return $this->render('home.html.twig', [
            'pseudo' => 'John Doe',
            'liste' => [
                'foo',
                'bar',
                'baz',
            ]
        ]);
    }


    /**
     * @Route("/test", name="test")
     */
    public function test(EntityManagerInterface $em)
    {
        // création d'une entité
        $product = new  Product();

        $product
            ->setName('Jeans')
            ->setDescription('Un super jean !')
            ->setPrice(79.99)
            ->setQuantity(50)
        ;

        // L'entité n'est pas encore enregistée en base
        dump($product);

        // Enregistrement (insertion)
        // 1.Préparer à l'enregistrement d'une entité
        $em->persist($product);
        // 2.Exécuter les les requêtes SQL
        $em->flush();

        // fonction de debug: dump() & die
        dd($product);
    }
}
