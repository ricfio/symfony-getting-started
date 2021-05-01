<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
        // generate a URL with no route arguments
        $urlHomepage = $this->generateUrl('homepage');

        // generate a URL with route arguments
        $urlBlogNextPage = $this->generateUrl('blog_list', [
            'page' => $page + 1,
        ]);

        // generated URLs are "absolute paths" by default. Pass a third optional
        // argument to generate different URLs (e.g. an "absolute URL")
        $urlBlogIndex = $this->generateUrl('blog_index', [], UrlGeneratorInterface::ABSOLUTE_URL);

        // when a route is localized, Symfony uses by default the current request locale
        // pass a different '_locale' value if you want to set the locale explicitly
        $urlLuckyInItalianIT = $this->generateUrl('lucky_number', ['_locale' => 'it', 'max' => 23, 'extra' => 'thesame']);

        return $this->render('blog/list.html.twig', [
            'page' => $page,
            'urlHomepage' => $urlHomepage,
            'urlBlogNextPage' => $urlBlogNextPage,
            'urlBlogIndex' => $urlBlogIndex,
            'urlLuckyInItalianIT' => $urlLuckyInItalianIT, 
        ]);
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
