<?php

//Strategy Design Pattern

interface PasswordHashInterface {
    function hash($data);
}

class MD5HashEngine implements PasswordHashInterface {
    function hash($data){
        return md5($data);
    }
}
class SHA1HashEngine implements PasswordHashInterface {
    function hash($data){
        return sha1($data);
    }
}
class NativeHashEngine implements PasswordHashInterface {
    function hash($data){
         return password_hash($data, PASSWORD_BCRYPT);
    }
}

class PasswordHashing {
    private $hashEngine;
    function __construct(PasswordHashInterface $hashEngine = null){
        $this->hashEngine = $hashEngine;
    }
    function setHashEngine(PasswordHashInterface $hashEngine){
        $this->hashEngine = $hashEngine;
    }
    function getHash($data){
        return $this->hashEngine->hash($data);
    }
}

$password = "3iS9d0";
$md5 = new MD5HashEngine();
$sha1 = new SHA1HashEngine();
$native = new NativeHashEngine();

$ph = new PasswordHashing();

$ph->setHashEngine($md5);
echo $ph->getHash($password).PHP_EOL;

$ph->setHashEngine($sha1);
echo $ph->getHash($password).PHP_EOL;

$ph->setHashEngine($native);
echo $ph->getHash($password);