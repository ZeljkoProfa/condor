<?php

namespace Controllers;

use Formatters\StatisticsCalculatorInterface;

/**
 * Class LikesController
 * Injects StatisticsCalculatorInterface
 */
class LikesController extends AbstractController
{
    /**
     * Method is hit on /Visitors/getVisitorsCount
     * Method that returns number of visitors for requested period.
     */
    public function getLikesCount()
    {

    }
}