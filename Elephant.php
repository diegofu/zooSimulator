<?php

require_once('Animal.php');

class Elephant extends Animal
{
    private $canWalk;

    const WALK_HEALTH_THRESHOLD = 70;

    public function __construct() {
        parent::__construct();

        $this->canWalk = true;
    }

    public function removeHealth() {
        parent::removeHealth();

        if($this->getHealth() < self::WALK_HEALTH_THRESHOLD) {
            if($this->getCanWalk()) {
                $this->disableWalk();
            } else {
                $this->dead();
            }
        }
    }

    public function feed() {
        parent::feed();

        if($this->getHealth() > WALK_HEALTH_THRESHOLD) {
            $this->enableWalk();
        }
    }

    private function disableWalk() {
        $this->canWalk = false;

        return $this;
    }

    private function enableWalk() {
        $this->canWalk = true;

        return $this;
    }

    private function getCanWalk() {
        return $this->canWalk;
    }
}