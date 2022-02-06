<?php

namespace Controllers;

use Config\Config;
use Clients\GoogleAnalyticsClient;
use Clients\PositiveGuysClient;
use DataCollector\DataCollector;
use DataTransformers\DBDataTransformer;
use DataTransformers\GoogleAnalyticsDataTransformer;
use DataTransformers\PositiveGaysDataTransformer;
use Statistics\StatisticsHandler;
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
     * @var StatisticsHandler
     */
    protected $data;

    /**
     * @var DataCollector
     */
    protected $dataCollector;

    /**
     * @var StatisticsHandler 
     */
    protected $statisticsHandler;

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
        
        $dbDataTransformer = new DBDataTransformer();
        $gaDataTransformer = new GoogleAnalyticsDataTransformer();
        $pgDataTransformer = new PositiveGaysDataTransformer();
        
        $this->dataCollector = new DataCollector(
            $dbRepository,
            $googleClient,
            $positiveGuysClient,
            $dbDataTransformer,
            $gaDataTransformer,
            $pgDataTransformer
        );
        
        $this->data = $this->dataCollector->combineData();
        $this->statisticsHandler = new StatisticsHandler();
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