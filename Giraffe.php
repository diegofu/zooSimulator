<?php

require_once('Animal.php');

class Giraffe extends Animal
{
    const HEALTH_THRESHOLD = 50;
    public function removeHealth() {
        parent::removeHealth();

        if($this->getHealth() < self::HEALTH_THRESHOLD) {
            $this->dead();
        }
    }
}