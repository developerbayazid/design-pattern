<?php

//Facade Design Pattern

class SpaceShuttle {
    function powerOn(){
        echo "Power on\n";
    }
    function checkTemperature(){
        echo "Temperature Ok\n";
    }
    function checkFuel(){
        echo "We have enough fuel\n";
    }
    function startEngine(){
        echo "Start Engine\n";
    }
    function startThrusters(){
        echo "Done!\n";
    }
}
class SpaceShuttleDecade {
    private $shuttle;
    function __construct(SpaceShuttle $shuttle){
        $this->shuttle = $shuttle;
    }
    function takeOff(){
        $this->shuttle->powerOn();
        $this->shuttle->checkTemperature();
        $this->shuttle->checkFuel();
        $this->shuttle->startEngine();
        $this->shuttle->startThrusters();
    }
}

$ss = new SpaceShuttle();
$ssd = new SpaceShuttleDecade($ss);
$ssd->takeOff();

// $ss->powerOn();
// $ss->checkTemperature();
// $ss->checkFuel();
// $ss->startEngine();
// $ss->startThrusters();