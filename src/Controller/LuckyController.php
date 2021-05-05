<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/{max}", name="lucky_number")
     */
    public function number(int $max = 100, LoggerInterface $logger): Response
    {
        $number = random_int(1, $max);

        $logger->info("The random number extracted is {$number}");

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
