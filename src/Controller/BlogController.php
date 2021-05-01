<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * This route has a greedy pattern and is defined first.
     * 
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(BlogPost $post): Response
    {
        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // ...
        return new Response(
            "<html><body>Blog slug({$post->id})</body></html>"
        );
    }

    /**
     * @Route("/blog/{page<\d+>?1}", name="blog_list", priority=2)
     */
    public function list(int $page): Response
    {
        // ...
        return new Response(
            "<html><body>Blog list, page n.{$page}</body></html>"
        );
    }
}
