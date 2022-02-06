<?php

namespace Controllers;

use Config\Config;
use Clients\GoogleAnalyticsClient;
use Clients\PositiveGuysClient;
use DataCollector\DataCollector;
use Domain\StatisticsCalculator;
use Repository\DBDBRepository;
use Request\HttpRequest;
use Validators\RequestMethodValidator;
use Exception;

abstract class AbstractController
{
    /**
     * @var HttpRequest
     */
    protected $request;

    /**
     * @var StatisticsCalculator
     */
    protected $data;

    /**
     * @var DataCollector
     */
    protected $dataCollector;

    /**
     * @var StatisticsCalculator 
     */
    protected $statisticsCalc;

    /**
     * AbstractController constructor.
     * @param HttpRequest $request
     */
    public function __construct(HttpRequest $request)
    {
        $this->request = $request;
        
        $dbRepository = new DBDBRepository();
        $googleClient = new GoogleAnalyticsClient();
        $positiveGuysClient = new PositiveGuysClient();
        
        $this->dataCollector = new DataCollector(
            $dbRepository,
            $googleClient,
            $positiveGuysClient
        );
        
        $this->data = $this->dataCollector->combineData();
        $this->statisticsCalc = new StatisticsCalculator();
    }

    /**
     * @throws Exception
     */
    public function get()
    {
        RequestMethodValidator::validateRequest($this->request->getRequestMethod(), Config::GET_REQUEST);
    }

    /**
     * @throws Exception
     */
    public function post()
    {
        RequestMethodValidator::validateRequest($this->request->getRequestMethod(), Config::POST_REQUEST);
    }

    /**
     * @throws Exception
     */
    public function put()
    {
        RequestMethodValidator::validateRequest($this->request->getRequestMethod(), Config::PUT_REQUEST);
    }

    /**
     * @throws Exception
     */
    public function delete()
    {
        RequestMethodValidator::validateRequest($this->request->getRequestMethod(), Config::DELETE_REQUEST);
    }
}