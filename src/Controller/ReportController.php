<?php

namespace App\Controller;

use App\Entity\AccountHistory;
use App\Entity\Deposit;
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

    /**
     * @Route("/report2", name="report2")
     */
    public function report2()
    {
        $repository = $this->getDoctrine()->getRepository(Deposit::class);
        $results = [];
        $results['18-24'] = $repository->getAverageSum(18, 24);
        $results['25-49'] = $repository->getAverageSum(25, 49);
        $results['50'] = $repository->getAverageSum(50);

        return $this->render('report/report2.html.twig', [
            'results' => $results
        ]);
    }
}
