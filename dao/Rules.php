<?php

/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 16:55
 */
/**
 * @MappedSuperdlass
 */
class Rules
{
    /** @Column(type="string") **/
    protected $name;

    /** @Column(type="date") **/
    protected $repeatTime;

    /**
     * Rules constructor.
     * @param $name
     * @param $repeatTime
     */
    public function __construct($name, $repeatTime)
    {
        $this->name = $name;
        $this->repeatTime = $repeatTime;
    }

    //region getters & setters

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRepeatTime()
    {
        return $this->repeatTime;
    }

    /**
     * @param mixed $repeatTime
     */
    public function setRepeatTime($repeatTime)
    {
        $this->repeatTime = $repeatTime;
    }

    //endregion getters & setters
}