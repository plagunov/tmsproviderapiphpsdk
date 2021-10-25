<?php


namespace ProviderTmsApiSdk;


class TmsTarif extends TmsExtendedModel
{

    protected $path = 'tarifs';

    /**
     * @var string
     */
    public $tarif_name;

    /**
     * @var int
     */
    public $tarif_tag;

    /**
     * @var bool
     */
    public $enabled;

    /**
     * @var int
     */
    public $provider = null;

    /**
     * @var int
     */
    public $id = null;

    public function serialize($jsonData)
    {
        $tarif = json_decode($jsonData);
        foreach ($tarif as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param int $channel
     * @param bool $enabled
     * @param int $provider
     * @param int $tarif_tag
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $channel = null, $enabled = null,
                            $provider = null, $tarif_tag = null, $quick_search = "")
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'channel' => $channel,
            'enabled' => $enabled,
            'provider' => $provider,
            'tarif_tag' => $tarif_tag,
            'quick_search' => $quick_search
        );

        list($tarifs, $total) = parent::getList($params, $start, $limit);

        return [ $tarifs, $total ];
    }
}