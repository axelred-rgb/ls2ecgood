<?php


class OrderCore extends \Model implements JsonSerializable
{

    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     * */
    protected $id;
    /**
     * @Column(name="totalweight", type="float" )
     * @var integer
     **/
    protected $totalweight = 0;
    /**
     * @Column(name="tariff", type="float" )
     * @var integer
     **/
    protected $tariff = 0;
    /**
     * @Column(name="totalamount", type="float"  )
     * @var integer
     **/
    protected $totalamount = 0;
    /**
     * @Column(name="commission", type="float", nullable=true  )
     * @var integer
     **/
    protected $commission = 0;
    /**
     * @Column(name="discountprice", type="float"  )
     * @var integer
     **/
    protected $discountprice = 0;
    /**
     * @Column(name="nettopay", type="float"  )
     * @var integer
     **/
    protected $nettopay = 0;

    /**
     * @Column(name="paymentmethod", type="string" , length=150 , nullable=true)
     * @var string
     **/
    protected $paymentmethod;
    /**
     * @Column(name="address_delivery_id", type="integer" , nullable=true)
     * @var string
     **/
    protected $address_delivery_id;
    /**
     * @Column(name="due_date", type="date" , nullable=true )
     **/
    protected $due_date;

    /**
     * @ManyToOne(targetEntity="\User")
     * @JoinColumn(onDelete="Cascade")
     * @var \User
     */
    public $user;

    /**
     * @ManyToOne(targetEntity="\Status")
     * @JoinColumn(onDelete="set null")
     * @var \Status
     */
    public $status;

    public function __construct($id = null)
    {

        $this->user = new User();
        $this->status = new Status();
    }

    /**
     * @return int
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param Status $status
     */
    public function setDue_date($due_date)
    {
        $this->due_date = $due_date;
    }

    /**
     * @return User
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @param User $seller
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;
    }

    /**
     * @return Cycle
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * @param Cycle $cycle
     */
    public function setCycle($cycle)
    {
        $this->cycle = $cycle;
    }

    /**
     * @return Fund
     */
    public function getFund()
    {
        return $this->fund;
    }

    /**
     * @param Fund $fund
     */
    public function setFund($fund)
    {
        $this->fund = $fund;
    }

    /**
     * @param int $commission
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;
    }
    /**
     * @param int $commission
     */
    public function m($amount)
    {
        return m($amount, $this->currency);
    }

    /**
     * convert the shop currency to the cart currenty (the cart currency is always the one of the marketplace.)
     * @param $amount
     * @param $currency
     * @return float|int|we
     */
    public function convert($amount, $currency)
    {
        // $currency = getcurrency();
        return $this->currency->convert($amount, $currency);
    }

}