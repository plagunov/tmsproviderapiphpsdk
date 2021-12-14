<?php
namespace ProviderTmsApiSdk;

/**
 * @method TmsDeviceSubscription|null get(int $id)
 */
class TmsDeviceSubscription extends TmsExtendedModel
{
    protected $path = 'device_subscriptions';

    /**
     * @var int
     */
    public $device;

    /**
     * @var string
     */
    public $start;

    /**
     * @var int
     */
    public $tarif;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $stop;

    public function serialize($jsonData)
    {
        $deviceSubscription = json_decode($jsonData);
        foreach ($deviceSubscription as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param int $device
     * @param int $tarif
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $device = null, $tarif = null, $quick_search = '')
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'device' => $device,
            'tarif' => $tarif,
            'quick_search' => $quick_search
        );
        list($deviceSubscriptions, $total) = parent::getList($params, $start, $limit);

        return [ $deviceSubscriptions, $total ];
    }
}
