<?php

require_once('Animal.php');

class Monkey extends Animal
{
    const HEALTH_THRESHOLD = 30;
    public function removeHealth() {
        parent::removeHealth();

        if($this->getHealth() < self::HEALTH_THRESHOLD) {
            $this->dead();
        }
    }
}