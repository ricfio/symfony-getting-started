<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route(
     *     "/",
     *     name="mobile_homepage",
     *     host="{subdomain}.example.com",
     *     defaults={"subdomain"="m"},
     *     requirements={"subdomain"="m|mobile"}
     * )
     */
    public function mobileHomepage(Request $request): Response
    {
        $host = $request->getHost();

        return new Response(
            "<html><body>Homepage custom for a specific host: {$host}</body></html>"
        );
    }

    /**
     * @Route("/main", name="homepage")
     */
    public function homepage(Request $request): Response
    {
        $host = $request->getHost();

        return new Response(
            "<html><body>Homepage standard for: {$host}</body></html>"
        );
    }
}
