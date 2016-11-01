<?php
require_once 'Account.php';
/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 16:31
 */

/**
 * @Entity
 * @Table(name = "tblUsers")
 **/
class User
{
    /** @Id @Column(type="integer") @GeneratedValue**/
    protected $id;

    /** @Column(type="string") **/
    protected $fName;

    /** @Column(type="string") **/
    protected $lName;

    /** @Column(type="string") **/
    protected $email;

    /** @Column(type="string") **/
    protected $passHash;

    /** @Column(type="date") **/
    protected $lastCheck;

    /** @ManyToMany(targetEntity="Account")
     * @joinTable(name="tblUserAccounts",
     *     joinColumns={@JoinColumn(name="FK_Userid", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="FK_Accountid", referencedColumnName="id", unique=true)}
     *     )
     */
    protected $accounts;

    /**
     * User constructor.
     * @param $fName
     * @param $lName
     * @param $email
     * @param $passHash
     */
    public function __construct($fName, $lName, $email, $passHash)
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->passHash = $passHash;
        $this->lastCheck = new \DateTime('now');
    }

    public function addAccount(){
        array_push($accounts, new Account());
    }

    //region getters & setters

    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName)
    {
        $this->fName = $fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName)
    {
        $this->lName = $lName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassHash()
    {
        return $this->passHash;
    }

    /**
     * @param mixed $passHash
     */
    public function setPassHash($passHash)
    {
        $this->passHash = $passHash;
    }

    /**
     * @return mixed
     */
    public function getLastCheck()
    {
        return $this->lastCheck;
    }

    /**
     * @param mixed $lastCheck
     */
    public function setLastCheck($lastCheck)
    {
        $this->lastCheck = $lastCheck;
    }


    /**
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    //endregion getters & setters
}