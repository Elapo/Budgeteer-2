<?php
include_once 'Rules.php';
/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 16:59
 */
/**
 * @Entity
 * @Table(name = "tblStaticRules")
 **/
class StaticRule extends Rules
{
    /** @Id @Column(type="integer") @GeneratedValue**/
    protected $id;

    /** @Column(type="decimal", precision=10, scale=2) **/
    protected $amount;

    /** @Column(type="boolean") **/
    protected $isPercent;

    /**
     * StaticRule constructor.
     * @param $name
     * @param $repeatTime
     * @param $amount
     * @param $isPercent
     */
    public function __construct($name, $repeatTime,$amount, $isPercent)
    {
        parent::__construct($name, $repeatTime);
        $this->amount = $amount;
        $this->isPercent = $isPercent;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getIsPercent()
    {
        return $this->isPercent;
    }

    /**
     * @param mixed $isPercent
     */
    public function setIsPercent($isPercent)
    {
        $this->isPercent = $isPercent;
    }

    //endregion getters & setters
}