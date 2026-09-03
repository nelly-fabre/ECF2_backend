<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Temporary placeholder for the home page (trombinoscope).
 * Will be replaced in Phase 5 with the actual student mosaic view.
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $user = $this->getUser();

        if ($user) {
            return new Response('Connecté en tant que : ' . $user->getUserIdentifier());
        }

        return new Response('Page d\'accueil (trombinoscope) — à venir en Phase 5.');
    }
}
