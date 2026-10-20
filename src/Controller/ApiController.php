<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

final class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): JsonResponse
    {
        $isDev = $this->getParameter('kernel.environment') === 'dev';
        return new JsonResponse(['is dev' => $isDev]);
    }
}
