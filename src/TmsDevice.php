<?php
namespace ProviderTmsApiSdk;

class TmsDevice extends TmsExtendedModel
{
    protected $path = 'devices';

    /**
     * @var string
     */
    public $unique_id;

    /**
     * @var int
     */
    public $account;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $ipaddr;

    /**
     * @var string
     */
    public $mac;

    /**
     * @var string
     */
    public $remote_custon_field;

    /**
     * @var string
     */
    public $comment;

    /**
     * @var string
     */
    public $last_online;

    /**
     * @var string
     */
    public $last_fw_ver;

    /**
     * @var string
     */
    public $first_online;

    /**
     * @var bool
     */
    public $use_nat;

    /**
     * @var string
     */
    public $operation_system;

    /**
     * @var string
     */
    public $udpxy_addr;

    /**
     * @var int
     */
    public $device_type;

    /**
     * @var int
     */
    public $provider;


    public function serialize($jsonData)
    {
        $device = json_decode($jsonData);
        foreach ($device as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param string $unique_id
     * @param int $device_type
     * @param int $provider
     * @param bool $enabled
     * @param string $remote_custom_field
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $unique_id = "", $device_type = null, $provider = null,
                            $enabled = null, $remote_custom_field="", $quick_search = "")
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'unique_id'=> $unique_id,
            'device_type' => $device_type,
            'provider' => $provider,
            'enabled' => $enabled,
            'remote_custom_field' => $remote_custom_field,
            'quick_search' => $quick_search
        );

        list($devices, $total) = parent::getList($params, $start, $limit);

        return [ $devices, $total ];
    }
}