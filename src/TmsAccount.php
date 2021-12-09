<?php
namespace ProviderTmsApiSdk;

/**
 * @method TmsAccount|null get(int $id)
 */
class TmsAccount extends TmsExtendedModel
{
    protected $path = 'accounts';

    /**
     * @var string
     */
    public $login;
    /**
     * @var string
     */
    public $fullname;

    /**
     * @var integer
     */
    public $id = null;

    /**
     * @var string
     */
    public $account_desc = "";
    /**
     * @var string
     */
    public $contract_info = "";
    /**
     * @var integer
     */
    public $devices_per_account_limit = null;
    /**
     * @var bool
     */
    public $enabled = true;
    /**
    * @var string
    */
    public $main_address = "";
    /**
     * @var string
     */
    public $pin_md5 = "";
    /**
     * @var string
     */
    public $remote_custom_field = "";
    /**
     * @var integer
     */
    public $provider = null;
    /**
     * @var integer
     */
    public $region_tag = null;

    public function serialize($jsonData)
    {
        $account = json_decode($jsonData);
        foreach ($account as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param int $provider
     * @param int $enabled
     * @param string $login
     * @param string $remote_custom_field
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort="", $provider = null, $enabled = null, $login = "", $remote_custom_field = "", $quick_search = "")
    {
        $params = array(
            'sort' => $sort,
            'provider' => $provider,
            'enabled' => $enabled,
            'login' => $login,
            'remote_custom_field' => $remote_custom_field,
            'quick_search' => $quick_search
        );

        list($accounts, $total) = parent::getList($params, $start, $limit);

        return [ $accounts, $total ];
    }
}