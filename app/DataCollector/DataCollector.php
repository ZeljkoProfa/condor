<?php

namespace DataCollector;

use Clients\GoogleAnalyticsInterface;
use Clients\PositiveGuysInterface;
use DataTransformers\DBDataTransformer;
use DataTransformers\GoogleAnalyticsDataTransformer;
use DataTransformers\PositiveGaysDataTransformer;
use Repository\DBRepositoryInterface;

class DataCollector
{
    // Repos and Clients
    /**
     * @var DBRepositoryInterface 
     */
    private $dbRepository;

    /**
     * @var GoogleAnalyticsInterface 
     */
    private $googleAnalytics;

    /**
     * @var PositiveGuysInterface 
     */
    private $positiveGuys;

    // Data Transformers
    /**
     * @var DBDataTransformer
     */
    private $dbDataTransformer;

    /**
     * @var GoogleAnalyticsDataTransformer
     */
    private $gaDataTransformer;

    /**
     * @var PositiveGaysDataTransformer
     */
    private $pgDataTransformer;

    /**
     * DataCollector constructor.
     * @param DBRepositoryInterface $dbRepository
     * @param GoogleAnalyticsInterface $googleAnalytics
     * @param PositiveGuysInterface $positiveGuys
     * @param DBDataTransformer $dbDataTransformer
     * @param GoogleAnalyticsDataTransformer $gaDataTransformer
     * @param PositiveGaysDataTransformer $pgDataTransformer
     */
    public function __construct(
        DBRepositoryInterface $dbRepository,
        GoogleAnalyticsInterface $googleAnalytics,
        PositiveGuysInterface $positiveGuys,
        DBDataTransformer $dbDataTransformer,
        GoogleAnalyticsDataTransformer $gaDataTransformer,
        PositiveGaysDataTransformer $pgDataTransformer
    )
    {
        $this->dbRepository = $dbRepository;
        $this->googleAnalytics = $googleAnalytics;
        $this->positiveGuys = $positiveGuys;
        
        $this->dbDataTransformer = $dbDataTransformer;
        $this->gaDataTransformer = $gaDataTransformer;
        $this->pgDataTransformer = $pgDataTransformer;
    }

    /**
     * Combine data from different sources into single array
     * 
     * @return array
     */
    public function combineData()
    {
        return [
            $this->dbDataTransformer->transformData($this->dbRepository->getDataFromTheSource()),
            $this->gaDataTransformer->transformData($this->googleAnalytics->getDataFromTheSource()),
            $this->pgDataTransformer->transformData($this->positiveGuys->getDataFromTheSource()),
        ];
    }
}