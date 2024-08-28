<?php
//SingleTon
class FileWriter {
    private $fileName;
    private static $instances = [];

    function __construct($fileName){
        $this->fileName = $fileName;
    }
    static function getInstances($fileName){
        if(!isset(self::$instances[$fileName])){
            self::$instances[$fileName] = new FileWriter($fileName);
        }
        return self::$instances[$fileName];
    }
    function dum(){
        print_r(self::$instances);
    }
    function writeData($data){
        echo "{$data} writing to {$this->fileName}\n";
    }
}

$f1 = FileWriter::getInstances("/temp/abcd.txt");
$f2 = FileWriter::getInstances("/temp/ab.txt");
$f3 = FileWriter::getInstances("/temp/abc.txt");
$f4 = FileWriter::getInstances("/temp/abd.txt");
$f5 = FileWriter::getInstances("/temp/abcd.txt");
$f6 = FileWriter::getInstances("/temp/abcd.txt");
$f7 = FileWriter::getInstances("/temp/abcd.txt");
$f8 = FileWriter::getInstances("/temp/abcd.txt");


$f1->writeData("SomeData");
$f2->writeData("SomeData");
$f3->writeData("SomeData");
$f4->writeData("SomeData");
$f5->writeData("SomeData");
$f6->writeData("SomeData");
$f7->writeData("SomeData");
$f8->writeData("SomeData");

$f6->dum();