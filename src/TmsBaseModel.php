<?php
namespace ProviderTmsApiSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class TmsBaseModel
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @param $id integer
     * @throws TmsException
     */
    public function get($id) {
        $config = TmsConfig::getInstance();
        $client = new Client();
        try {
            $response = $client->request(
                "GET",
                $config->baseUrl . "/" . $this->path . '/' . $id,
                [
                    'headers' => $config->headers,
                    'auth' => $config->auth
                ]
                );
        } catch (GuzzleException $exception){
            throw new TmsException($exception->getMessage());
        }


        return $this->serialize($response->getBody()->getContents());
    }

    /**
     * @param array $params
     * @param int $start
     * @param int $limit
     */
    public function getList($params, $start=0, $limit=50)
    {
        $objects = array();
        $config = TmsConfig::getInstance();
        $client = new Client();

        $query = "?start=" . $start . "&limit=" . $limit;

        foreach ($params as $key => $value) {
            if (!empty($value) || $value != null) {
                $query .= "&" . $key . "=" . $value;
            }
        }

        try {
            $response = $client->request(
                "GET",
                $config->baseUrl . "/" . $this->path . $query,
                [
                    'headers' => $config->headers,
                    'auth' => $config->auth
                ]
            );
        } catch (GuzzleException $exception) {
            throw new TmsException($exception->getMessage());
        }

        $jsonData = $response->getBody()->getContents();

        foreach (json_decode($jsonData)->data as $data) {
            $o = clone ($this->serialize(json_encode($data)));
            array_push($objects, $o);

        }

        $totalDevices = json_decode($jsonData)->total;

        return [ $objects, $totalDevices ];

    }

    abstract function serialize($jsonData);

}