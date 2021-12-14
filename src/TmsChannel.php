<?php
namespace ProviderTmsApiSdk;

/**
 * @method TmsChannel|null get(int $id)
 */
class TmsChannel extends TmsBaseModel
{

    protected $path = 'channels';

    /**
     * @var int
     */
    public $id = null;

    /**
     * @var string
     */
    public $name = "";

    /**
     * @var string
     */
    public $text_name = "";

    /**
     * @var string
     */
    public $display_number = "";

    /**
     * @var string
     */
    public $logo_url = "";

    /**
     * @var bool
     */
    public $enabled = false;

    /**
     * @var int
     */
    public $time_shift_depth = null;

    public function serialize($jsonData)
    {
        $channel = json_decode($jsonData);
        foreach ($channel as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param int $tarif
     * @param bool $enabled
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $tarif = null, $enabled = null, $quick_search = "")
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'tarif' => $tarif,
            'enabled' => $enabled,
            'quick_search' => $quick_search
        );

        list($channels, $total) = parent::getList($params, $start, $limit);

        return [ $channels, $total ];
    }


}