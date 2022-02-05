<?php

namespace Repository;

class DataCollector
{
    private $dbRepository;

    private $remoteRepository;

    private $additionalRepository;

    private $dbData;

    private $remoteData;

    private $additionalData;

    /**
     * DataCollector constructor.
     * @param DBRepositoryInterface $dbRepository
     * @param RemoteServiceRepositoryInterface $remoteRepository
     * @param AdditionalAnalyticsRepositoryInterface $additionalRepository
     */
    public function __construct(
        DBRepositoryInterface $dbRepository,
        RemoteServiceRepositoryInterface $remoteRepository,
        AdditionalAnalyticsRepositoryInterface $additionalRepository
    )
    {
        $this->dbRepository = $dbRepository;
        $this->remoteRepository = $remoteRepository;
        $this->additionalRepository = $additionalRepository;
    }

    /**
     * Combine data from different sources into single array
     * 
     * @return array
     */
    public function combineData()
    {
        $this->dbData = $this->dbRepository->getDataFromTheSource();
        $this->remoteData = $this->remoteRepository->getDataFromTheSource();
        $this->additionalData = $this->additionalRepository->getDataFromTheSource();

        return [$this->dbData, $this->remoteData, $this->additionalData];
    }
}