<?php

namespace Controllers;

use Formatters\StatisticsCalculatorInterface;

/**
 * Class VisitsController
 * Injects StatisticsCalculatorInterface
 */
class VisitsController
{
    /**
     * Method is hit on /Visitors/getVisitorsCount
     * Method that returns number of visitors for requested period.
     */
    public function getVisitorsCount()
    {
        var_dump('controller');
    }
}
