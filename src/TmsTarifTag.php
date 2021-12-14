<?php
namespace ProviderTmsApiSdk;
/**
 * @method TmsTarifTag|null get(int $id)
 */
class TmsTarifTag extends TmsExtendedModel
{
    protected $path = 'tarif_tags';

    /**
     * @var bool
     */
    public $enabled;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $provider;

    /**
     * @var int
     */
    public $id = null;

    /**
     * @var int
     */
    public $position = null;

    public function serialize($jsonData)
    {
        $tarifTag = json_decode($jsonData);
        foreach ($tarifTag as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    public function getList($start = 0, $limit = 50, $sort = "",$enabled = null, $provider = null, $quick_search = "")
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'enabled' => $enabled,
            'provider' => $provider,
            'quick_search' => $quick_search
        );

        list($tarifTags, $total) = parent::getList($params, $start, $limit);

        return [ $tarifTags, $total ];
    }

}