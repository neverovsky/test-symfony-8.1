<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/blog', name: 'blog_', requirements: ['locale' => 'en|fr'], methods: ['GET'])]
final class BlogController extends AbstractController
{
    //    #[Route("/{locale}", name: "blog_locale")]
    //    public function locale(): Response
    //    {
    //        return new Response('locale');
    //    }
    //
    //    #[Route("/{locale}/{slug}", name: "blog_locale_slug")]
    //    public function show(Request $request): Response
    //    {
    //        dd($request->attributes->get('slug'));
    //        return new Response('show');
    //    }

    #[Route('/', name: 'app_blog', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/{page}', name: 'app_blog_page', requirements: ['page' => Requirement::DIGITS], methods: ['GET'])]
    public function list(int $page): Response
    {
        return $this->render('blog/index.html.twig', ['controller_name' => 'BlogController', 'page' => $page]);
    }

    #[Route('/blog/{slug}', name: 'app_blog_show', methods: ['GET', 'POST'])]
    public function show(string $slug): Response
    {
        return new Response($slug);
    }

    public function info(): Response
    {
        ob_start();
        phpinfo();
        $content = ob_get_clean();

        return new Response($content);
    }
}
