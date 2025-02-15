<?php

namespace Paps\Resources;

use Paps\PapsClient;
use Paps\PapsException;

use GuzzleHttp\TransferStats;

/**
 * @package Paps\Resources
 */
abstract class AbstractResource
{
    /**
     * HTTP Client
     *
     * @var PapsClient
     */
    protected $client;

    /**
     * Endpoint URL
     *
     * @var
     */
    protected $endpoint;

    /**
     * Request method
     *
     * @var
     */
    protected $method;

    /**
     * Request parameters
     *
     * @var array
     */
    protected $params = [];

    /**
     * Constructor
     *
     * @param PapsClient $client
     */
    public function __construct(PapsClient $client)
    {
        $this->client = $client;
    }

    /**
     * Handle API Calls
     *
     * @return mixed
     * @throws PapsException
     */
    protected function send()
    {
        try {
            // in case of customer_id being in the URL replace it here with the customer_id from config
            $this->setEndpoint($this->getEndpoint());

            $clientConfig = $this->client->getConfig();

            $defaultQueryParams = ['api_key' => $clientConfig['api_key']];
            if ($clientConfig['mode'] == "test") {
                $defaultQueryParams['test'] = true;
            }

            $params = [];

            // include params if present
            if (!empty($this->getParams())) {
                if ($this->getMethod() == 'POST') {
                    $params = [
                        'form_params' => $this->getParams(),
                        'query' => $defaultQueryParams
                        // 'on_stats' => function (TransferStats $stats) use (&$url) {
                        //   echo $stats->getEffectiveUri();
                        // }
                    ];
                }

                if ($this->getMethod() == 'GET') {
                    $params = [
                        'query' => array_merge($this->getParams(), $defaultQueryParams)
                    ];
                }
            }

            $response = $this->client
                ->getHttpClient()
                ->request($this->getMethod(), $this->getEndpoint(), $params);
        } catch (\Exception $e) {
            throw new PapsException($e->getMessage(), $e->getCode());
        }

        $parsed_response = json_decode($response->getBody(), true);

        if ($parsed_response === null) {
            throw new PapsException('Empty body response.');
        }

        if (
            is_array($parsed_response) ||
            isset($parsed_response['status']) ||
            isset($parsed_response['message'])
        ) {
            return $parsed_response;
        } else {
            throw new PapsException(
                $parsed_response['message'],
                0,
                null,
                $parsed_response['params']
            );
        }
    }

    /**
     * @return mixed
     */
    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     *
     * @return AbstractResource
     */
    protected function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     *
     * @return AbstractResource
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param array $params
     *
     * @return AbstractResource
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }
}
