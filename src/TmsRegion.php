<?php


namespace ProviderTmsApiSdk;

/**
 * @method TmsRegion|null get(int $id)
 */
class TmsRegion extends TmsBaseModel
{
    protected $path = 'regions';

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    public function serialize($jsonData)
    {
        $region = json_decode($jsonData);
        foreach ($region as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $quick_search = "")
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'quick_search' => $quick_search
        );

        list($regions, $total) = parent::getList($params, $start, $limit);

        return [ $regions, $total ];
    }

}