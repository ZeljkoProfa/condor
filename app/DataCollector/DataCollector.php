<?php

namespace DataCollector;

use Clients\GoogleAnalyticsInterface;
use Clients\PositiveGuysInterface;
use Repository\DBRepositoryInterface;

class DataCollector
{
    private $dbRepository;

    private $googleAnalytics;

    private $positiveGuys;

    private $dbData;

    private $googleAnalyticsData;

    private $positiveGuysData;

    /**
     * DataCollector constructor.
     * @param DBRepositoryInterface $dbRepository
     * @param GoogleAnalyticsInterface $googleAnalytics
     * @param PositiveGuysInterface $positiveGuys
     */
    public function __construct(
        DBRepositoryInterface $dbRepository,
        GoogleAnalyticsInterface $googleAnalytics,
        PositiveGuysInterface $positiveGuys
    )
    {
        $this->dbRepository = $dbRepository;
        $this->googleAnalytics = $googleAnalytics;
        $this->positiveGuys = $positiveGuys;
    }

    /**
     * Combine data from different sources into single array
     * 
     * @return array
     */
    public function combineData()
    {
        $this->dbData = $this->dbRepository->getDataFromTheSource();
        $this->googleAnalyticsData = $this->googleAnalytics->getDataFromTheSource();
        $this->positiveGuysData = $this->positiveGuys->getDataFromTheSource();

        return [$this->dbData, $this->googleAnalyticsData, $this->positiveGuysData];
    }
}