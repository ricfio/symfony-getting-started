<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="mobile_homepage", host="127.0.0.1")
     */
    public function mobileHomepage(): Response
    {
        // ...
        return new Response(
            "<html><body>Homepage for a specific domain</body></html>"
        );
    }

    /**
     * @Route("/main", name="homepage")
     */
    public function homepage(): Response
    {
        // ...
        return new Response(
            "<html><body>homepage standard</body></html>"
        );
    }
}
