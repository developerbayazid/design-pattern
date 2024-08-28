<?php

//Singleton

class SomeClass {
    static $instance;
    private $name;

    function __construct ($name){
        $this->name = $name;
        echo "Instance Created\n";
    }

    static function getInstance($name=''){
        if(!self::$instance){
            self::$instance = new SomeClass($name);
            echo "New Instance Supplied\n";
        }else{
            echo "Old Instance Supplied\n";
        }
        return self::$instance;
    }

    function getName(){
        echo $this->name."\n";
    }
}

$c1 = SomeClass::getInstance("Abdur Rahim");
$c2 = SomeClass::getInstance("Abdur Rahman");
$c3 = SomeClass::getInstance();

$c1->getName();
$c2->getName();
$c3->getName();

