<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog", requirements={"_locale": "en|es|fr"}, name="blog_")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="index")
     */
    public function index(Request $request): Response
    {
        // ...
        return new Response(
            "<html><body>Blog index<br>- locale: {$request->getLocale()}</body></html>"
        );
    }

    /**
     * @Route("/{page}", name="list", requirements={"page"="\d+"}, defaults={"page": 1, "title": "Hello world!"})
     */
    public function list(Request $request, int $page): Response
    {
        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');        

        // use this to get all the available attributes (not only routing ones):
        $allAttributes = $request->attributes->all();
        
        return new Response(
            "<html><body>Blog list, page n.{$page}
                <br>- routeName: {$routeName}
                <br>- routeParameters: ".implode(",",$routeParameters)."
                <br>- allAttributes: <pre>".var_export($allAttributes, true)."</pre>
            </body></html>"
        );
    }

    /**
     * This route has a greedy pattern and is defined first.
     * 
     * @Route("/{slug}", name="show")
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
