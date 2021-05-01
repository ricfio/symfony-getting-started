<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{page}", name="blog_list", defaults={"page": 1, "title": "Hello world!"})
     */
    public function list(int $page): Response
    {
        // ...
        return new Response(
            "<html><body>Blog list, page n.{$page}</body></html>"
        );
    }

    /**
     * This route has a greedy pattern and is defined first.
     * 
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show(string $slug): Response
    {
        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // ...
        return new Response(
            "<html><body>Blog slug({$slug})</body></html>"
        );
    }
}
