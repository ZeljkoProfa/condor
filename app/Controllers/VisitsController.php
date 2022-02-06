<?php

namespace Controllers;

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
    public function get()
    {
        parent::get();
        
        return new Response($this->statisticsHandler->getStatistics($this->data, $this->request->getParams()));
    }
}
