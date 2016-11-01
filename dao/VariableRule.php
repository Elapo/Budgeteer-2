<?php
include_once 'Rules.php';
/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 16:58
 */
/**
 * @Entity
 * @Table(name = "tblVariableRules")
 **/
class VariableRule extends Rules
{
    /** @Id @Column(type="integer") @GeneratedValue**/
    protected $id;

    /**
     * VariableRule constructor.
     * @param $name
     * @param $repeatTime
     */
    public function __construct($name, $repeatTime)
    {
        parent::__construct($name, $repeatTime);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}