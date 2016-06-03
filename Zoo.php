<?php

require_once('Monkey.php');
require_once('Giraffe.php');
require_once('Elephant.php');

class Zoo {
    private $animals;

    private $hour;

    public static $animalTypes = array('Monkey', 'Giraffe', 'Elephant');
    public function __construct() {
        for($i = 0; $i < 15; $i++) {
            $this->animals[] = new self::$animalTypes[rand(0, 2)];
        }

        $this->hour = 0;
    }

    public function nextHour() {
        $this->hour++;

        foreach($this->animals as $animal) {
            $animal->removeHealth();
        }
    }

    public function feed() {
        foreach($this->animals as $animal) {
            $animal->feed(rand(0, 25));
        }
    }

    public function getAnimals() {
        return $this->animals;
    }

    public function getHour() {
        return $this->hour;
    }

}
