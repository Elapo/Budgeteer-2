<?php

/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 20:53
 */
include_once("/dao/User.php");

class AuthHandler
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    function authenticateUser($email, $password){
        $user = $this->em
            ->getRepository("User")
            ->findBy(array('email' => $email));
        $_SESSION['authTry'] = $user;
        if(isset($user[0]) && is_a($user[0], 'User')){
            $_SESSION['user'] = $user;
            return password_verify($password, $user[0]->getPassHash());
        }
        else return false;
    }

    function generateToken($ipAddr, $email){
        $now = time();
        $rand = random_bytes(256);
        $rand = $rand.$now.$ipAddr.$email;
        $hash = password_hash($rand, PASSWORD_DEFAULT);
        $token['stamp'] = $now;
        $token['hash'] = $hash;
        $_SESSION['ip'] = $ipAddr;
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token;
        $_SESSION['salt'] = $rand;
        return json_encode($token, JSON_UNESCAPED_SLASHES);
    }

    function verifyToken($token, $ipAddr, $email){
        if(isset($_SESSION['token']) && $token['stamp'] < time() && $token['stamp'] < ($token['stamp'] + (60*30))){ //token should be in the past and not older than 30mins
            if(password_verify($_SESSION['salt'].$token['stamp'].$ipAddr.$email, $_SESSION['token']['hash'])){
                return $_SESSION['token']['hash'] == $token['hash'];
            } //kinda overkill and stupid but w/e. don't need the password_verify to see whether stamp, ip and mail are the same.
            //todo:revise
        }
        return false;
    }
}