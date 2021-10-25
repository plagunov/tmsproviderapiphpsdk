<?php
namespace ProviderTmsApiSdk;

class TmsProvider extends TmsBaseModel
{
    protected $path = 'providers';

    /**
     * @var int
     */
    public $id = null;

    /**
     * @var int
     */
    public $region_tag = null;

    /**
     * @var string
     */
    public $provider_name = null;

    /**
     * @var string
     */
    public $provider_comment = null;

    /**
     * @var bool
     */
    public $enabled = false;

    /**
     * @var string
     */
    public $logo_url = null;

    /**
     * @var int
     */
    public $devices_per_account_limit = null;

    public function serialize($jsonData)
    {
        $provider = json_decode($jsonData);
        foreach ($provider as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param bool $enabled
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $enabled = null, $quick_search = "")
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'enabled' => $enabled,
            'quick_search' => $quick_search
        );

        list($providers, $total) = parent::getList($params, $start, $limit);

        return [ $providers, $total ];
    }

}