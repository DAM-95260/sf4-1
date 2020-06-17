<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
     *  On place les paramètre dynamique entre accolades
     * URI valide: /test/42
     *
     * @Route("/test/{id}", name="test")
     */
    public function test($id, Request $request, SessionInterface $session)
    {
        return $this->json([
            'id' => $id,
            'section' => $request->query->get('section', 'profil'),
            'session' => $session->get('user'),
        ]);
    }
}
