<?php

namespace Controllers;

use Domain\StatisticsCalculator;
use Response\Response;
use Exception;

/**
 * Class VisitsController
 * Injects StatisticsCalculatorInterface
 */
class VisitsController extends AbstractController
{
    /**
     * Method is hit on /Visitors/getVisitorsCount
     * Method that returns number of visitors for requested period.
     * 
     * @return Response
     * @throws Exception
     */
    public function getVisitorsCount()
    {
        $statisticCalculator = new StatisticsCalculator();
        
        return new Response($statisticCalculator->getStatistics($this->data, $this->request->getParams()));
    }
}
