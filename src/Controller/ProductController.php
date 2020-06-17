<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * Liste des produits
     * @Route("/product", name="product_list")
     */
    public function  liste()
    {
        return $this->json([
            'titre' => 'Liste des produits'
        ]);
    }

    /**
     * Ajout d'un produit
     * @Route("/product/new", name="product_add")
     */
    public function add()
    {
        return $this->json([
            'titre' => 'Ajouter un produit'
        ]);
    }

    /**
     * Modification d'un produit
     * @Route("/product/{id}/edit", name="product_edit")
     */
    public  function  edit($id)
    {
        return $this->json([
            'titre' => 'Modifier le produit ' . $id
        ]);
    }

}

