<?php
//Abstract Factory Design

class Truck {
    function getName(){
        echo "Truck";
    }
}
class Car {
    function getName(){
        echo "Car";
    }
}

interface VFactory {
    function create();
}

class CarFactory implements VFactory {
    function create(){
        return new Car();
    }
}
class TruckFactory implements VFactory {
    function create(){
        return new Truck();
    }
}

class VehicleFactory {
    function getVehicle($vehicleType='car'){
        if('car' == $vehicleType){
            return new CarFactory();
        }elseif('truck' == $vehicleType){
            return new TruckFactory();
        }
    }
}

$vf = new VehicleFactory();
$cf = $vf->getVehicle('car');
$tf = $vf->getVehicle('truck');

$car = $cf->create();
echo $car->getName().PHP_EOL;
$truck = $tf->create();
echo $truck->getName();
