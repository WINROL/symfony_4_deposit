<?php

namespace App\Controller;

use App\Entity\AccountHistory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    /**
     * @Route("/report1", name="report1")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(AccountHistory::class);
        $results = $repository->getSumForAllMonths();

        return $this->render('report/index.html.twig', [
            'results' => $results
        ]);
    }
}
