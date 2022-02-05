<?php

namespace Controllers;

use Domain\StatisticsCalculator;
use Formatters\StatisticsCalculatorInterface;
use Request\HttpRequest;
use Response\Response;

/**
 * Class VisitsController
 * Injects StatisticsCalculatorInterface
 */
class VisitsController extends AbstractController
{
    /**
     * Method is hit on /Visitors/getVisitorsCount
     * Method that returns number of visitors for requested period.
     */
    public function getVisitorsCount()
    {
        return new Response($this->statisticsCalculator->getStatistics());
    }
}
