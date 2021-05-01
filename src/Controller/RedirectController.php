<?php
// src/Controller/RedirectController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
    /**
     * @Route("/redirect/{alias}", requirements={"alias"="home|lucky|blog|doc"})
     */
    public function index(Request $request, string $alias): RedirectResponse
    {
        switch ($alias) {
            case 'lucky':
                // redirect to a route with parameters
                return $this->redirectToRoute('app_lucky_number', ['max' => 10]);
            case 'blog':
                // redirects to a route and maintains the original query string parameters
                return $this->redirectToRoute('blog_list', $request->query->all());
            case 'doc':
                // redirects externally
                return $this->redirect('http://symfony.com/doc');            
            case 'home':
            default:
                // redirects to the "homepage" route
                return $this->redirectToRoute('homepage');

                // redirectToRoute is a shortcut for:
                // return new RedirectResponse($this->generateUrl('homepage'));

                // does a permanent - 301 redirect
                // return $this->redirectToRoute('homepage', [], 301);
                break;
        }
    }
}
