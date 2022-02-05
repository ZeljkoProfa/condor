<?php

namespace Domain;

use Exception;

/**
 * Class StatisticsCalculator
 * Injects SourceHandler
 */
class StatisticsCalculator
{    
    private $data = [];

    /**
     * Calculates statistics to return to controller
     * 
     * @param $data
     * @param $params
     * @return array
     * @throws Exception
     */
    public function getStatistics($data, $params)
    {
        $this->data = $data;
        
        return $this->calculateStatistics($params);
    }

    /**
     * Calculate statistics according given parameters
     * 
     * @param $params
     * @return array
     * @throws Exception
     */
    private function calculateStatistics($params)
    {
        if (!$params['year']) {
            throw new Exception('Missing parameter: year.', 406);
        }
        
        if (!$params['month']) {
            return $this->calculateStatisticsPerYear($params['year']);
        }
        
        return $this->calculateStatisticsPerMonth($params['year'], $params['month']);
    }

    /**
     * Calculate statistics per year
     * 
     * @param $targetYear
     * @return array
     */
    private function calculateStatisticsPerYear($targetYear)
    {
        $result = [];
        
        foreach ($this->data as $resources) {
            foreach ($resources as $year => $resource) {
                if ((int)$year !== (int)$targetYear) {
                    continue;
                }

                foreach ($resource as $month => $visits) {
                    foreach ($visits as $clickSource => $visit) {
                        $result[$clickSource] += $visit;
                    }
                }
            }
        }
        
        return $result;
    }

    /**
     * Calculate statistics per month
     * 
     * @param $targetYear
     * @param $targetMonth
     * @return array
     */
    private function calculateStatisticsPerMonth($targetYear, $targetMonth)
    {
        $result = [];

        foreach ($this->data as $resources) {
            foreach ($resources as $year => $resource) {
                if ((int)$year !== (int)$targetYear) {
                    continue;
                }

                foreach ($resource as $month => $visits) {
                    if ((int)$month !== (int)$targetMonth) {
                        continue;
                    }
                    
                    foreach ($visits as $clickSource => $visit) {
                        $result[$clickSource] += $visit;
                    }
                }
            }
        }

        return $result;
    }
}