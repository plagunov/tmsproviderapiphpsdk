<?php
namespace ProviderTmsApiSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


abstract class TmsExtendedModel extends TmsBaseModel
{
    protected $path;

    public function create()
    {
        $config = TmsConfig::getInstance();
        $jsonData = json_encode($this);

        $client = new Client();
        try {
            $response = $client->request(
                "POST",
                $config->baseUrl . "/" . $this->path,
                [
                    'headers' => $config->headers,
                    'auth' => $config->auth,
                    'body' => $jsonData
                ]
            );
        } catch (GuzzleException $exception){
            throw new TmsException($exception->getMessage());
        }

        return $this->serialize($response->getBody()->getContents());
    }

    public function update()
    {
        if (!isset($this->id)) {
            throw new TmsException("Filed id cannoy be empty");
        }

        $config = TmsConfig::getInstance();
        $jsonData = json_encode($this);

        $client = new Client();
        try {
            $response = $client->request(
                "PUT",
                $config->baseUrl . "/" . $this->path . "/" . $this->id,
                [
                    'headers' => $config->headers,
                    'auth' => $config->auth,
                    'body' => $jsonData
                ]
            );
        } catch (GuzzleException $exception){
            throw new TmsException($exception->getMessage());
        }

        return $this->serialize($response->getBody()->getContents());
    }

    public function delete()
    {
        if (!isset($this->id)) {
            throw new TmsException("Filed id cannoy be empty");
        }

        $config = TmsConfig::getInstance();
        $jsonData = json_encode($this);

        $client = new Client();
        try {
            $response = $client->request(
                "DELETE",
                $config->baseUrl . "/" . $this->path . "/" . $this->id,
                [
                    'headers' => $config->headers,
                    'auth' => $config->auth,
                ]
            );
        } catch (GuzzleException $exception){
            throw new TmsException($exception->getMessage());
        }

        return $response->getStatusCode();
    }

//    abstract function serialize($jsonData);
}