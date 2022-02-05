<?php

namespace Domain;

use Domain\SourceHandler;
use Repository\AdditionalAnalyticsRepositoryInterface;
use Repository\DBRepositoryInterface;
use Repository\RemoteServiceRepositoryInterface;

/**
 * Class StatisticsCalculator
 * Injects SourceHandler
 */
class StatisticsCalculator
{
    /**
     * @var 
     */
    private $sourceHandler;
    
    private $dbRepository;
    
    private $remoteRepository;
    
    private $additionalRepository;
    
    public function __construct(
        DBRepositoryInterface $dbRepository,
        RemoteServiceRepositoryInterface $remoteRepository,
        AdditionalAnalyticsRepositoryInterface $additionalRepository
    )
    {
        $this->sourceHandler = new SourceHandler();
        $this->dbRepository = $dbRepository;
        $this->remoteRepository = $remoteRepository;
        $this->additionalRepository = $additionalRepository;
    }

    /**
     * Calculates statistics to return to controller
     */
    public function getStatistics()
    {
        return $this->dbRepository->getDataFromTheSource();
    }
}