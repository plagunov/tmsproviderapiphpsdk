<?php
namespace ProviderTmsApiSdk;
/**
 * @method TmsAccountSubscription|null get(int $id)
 */
class TmsAccountSubscription extends TmsExtendedModel
{
    protected $path = "account_subscriptions";

    /**
     * @var integer
     */
    public $account;

    /**
     * @var string
     */
    public $start;

    /**
     * @var integer
     */
    public $tarif;

    /**
     * @var integer
     */
    public $id = null;

    /**
     * @var string
     */
    public $stop = null;

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
     * @param int $account
     * @param int $tarif
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $account = null, $tarif = null, $quick_search = "")
    {
        $params = array(
            'start' => $start,
            'limit' => $limit,
            'sort' => $sort,
            'account' => $account,
            'tarif' => $tarif,
            'quick_search' => $quick_search
        );
        list($accountSubscriptions, $total) = parent::getList($params, $start, $limit);

        return [ $accountSubscriptions, $total ];
    }
}