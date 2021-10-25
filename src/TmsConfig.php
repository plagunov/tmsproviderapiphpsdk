<?php
namespace ProviderTmsApiSdk;

class TmsConfig extends Singleton
{

    /**
     * @var string
     */
    public $baseUrl;
    /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $token;
    /**
     * @var array
     */
    public $headers;

    public function Configure($baseUrl, $username = null, $password = null, $token = null)
    {
        $this->baseUrl = $baseUrl;
        $this->username = $username;
        $this->password = $password;
        $this->token = $token;

        $this->headers = $this->setHeaders();
        $this->auth = $this->setAuth();

    }

    private function setHeaders()
    {
        $this->baseUrl = $this->baseUrl . '/api/provider';
        $headers = array(
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        );

        return $headers;
    }

    private function setAuth(){

        if ($this->username && ($this->password || $this->token)) {
            if ($this->password) {
                $auth = array(
                        $this->username,
                        $this->password
                    );
            }
            if ($this->token) {
                $auth = array(
                        $this->username,
                        $this->token
                );
            }
        }

        return $auth;
    }


}