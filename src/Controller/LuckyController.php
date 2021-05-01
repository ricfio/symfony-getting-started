<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/{max}", name="lucky_number")
     */
    public function number(int $max = 100): Response
    {
        $number = random_int(1, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
