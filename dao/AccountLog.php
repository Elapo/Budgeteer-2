<?php

/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 16:46
 */
/**
 * @Entity
 * @Table(name = "tblAccountLog")
 **/
class AccountLog
{
    /** @Id @Column(type="integer") @GeneratedValue**/
    protected $id;

    /** @Column(type="decimal", precision=10, scale=2) **/
    protected $amount;

    /** @Column(type="date") **/
    protected $timeStamp;

    /** @Column(type="string") **/
    protected $comment;

    /**
     * AccountLog constructor.
     * @param $amount
     * @param $timeStamp
     * @param $comment
     */
    public function __construct($amount, $timeStamp, $comment)
    {
        $this->amount = $amount;
        $this->timeStamp = $timeStamp;
        $this->comment = $comment;
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
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * @param mixed $timeStamp
     */
    public function setTimeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    //endregion getters & setters
}