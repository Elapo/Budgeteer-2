<?php
require_once 'AccountLog.php';
require_once 'StaticRule.php';
require_once 'VariableRule.php';
/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 16:40
 */
/**
 * @Entity
 * @Table(name="tblAccounts")
 **/
class Account
{
    /** @Id @Column(type="integer") @GeneratedValue**/
    protected $id;

    /** @Column(type="decimal", precision=10, scale=2) **/
    protected $balance;

    /** @Column(type="date") **/
    protected $created;

    /** @Column(type="string") **/
    protected $currency;

    /** @OneToOne(targetEntity="AccountLog")
     * @JoinColumn(name="FK_AccountLogID", referencedColumnName="id")**/
    protected $accountLog;

    /** @ManyToMany(targetEntity="StaticRule")
     * @joinTable(name="tblAccountStaticRules",
     *     joinColumns={@JoinColumn(name="FK_Accountid", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="FK_StaticRuleid", referencedColumnName="id", unique=true)}
     *     )
     */
    protected $staticRules;

    /** @ManyToMany(targetEntity="VariableRule")
     * @joinTable(name="tblAccountVariableRules",
     *     joinColumns={@JoinColumn(name="FK_Accountid", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="FK_VariableRuleid", referencedColumnName="id", unique=true)}
     *     )
     */
    protected $variableRules;

    /**
     * Account constructor.
     */
    public function __construct()
    {
        $this->created = time();
        $this->balance = 0;
        $this->currency = '&euro;';
    }

    /**
     * @param $amount
     * @param $comment
     * @param null $time
     */
    public function addTransaction($amount, $comment, $time = null){
        if($time == null) $time = time();
        array_push($this->accountLog, new accountLog($amount, $time, $comment));
        $this->balance += $amount;
    }

    public function addStaticRule($name, $repeatTime,$amount, $isPercent){
        array_push($this->staticRules, new StaticRule($name, $repeatTime,$amount, $isPercent));
    }

    public function addVariableRule($name, $repeatTime){
        array_push($this->variableRules, new VariableRule($name, $repeatTime));
    }

    //region getters & setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAccountLog()
    {
        return $this->accountLog;
    }

    /**
     * @param mixed $accountLog
     */
    public function setAccountLog($accountLog)
    {
        $this->accountLog = $accountLog;
    }

    /**
     * @return mixed
     */
    public function getStaticRules()
    {
        return $this->staticRules;
    }

    /**
     * @return mixed
     */
    public function getVariableRules()
    {
        return $this->variableRules;
    }

    //endregion getters & setters
}