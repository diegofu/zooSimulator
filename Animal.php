<?php

abstract class Animal
{
    private $health;

    private $isDead;

    public function __construct() {
        $this->health = 100.0;
        $this->isDead = false;
    }

    public function getHealth() {
        return $this->health;
    }

    public function isDead() {
        return $this->isDead;
    }

    public function feed($value) {
        if ($this->isDead()) {
            return;
        }

        $this->health *= (100 + $value) / 100;

        $this->health = min($this->health, 100.0);
    }

    public function removeHealth() {
        if ($this->isDead()) {
            return;
        }

        $rand = rand(0, 20);

        $this->health *= (100 - $rand) / 100;
    }

    public function dead() {
        $this->isDead = true;
    }

    public function getName() {
        return get_class($this);
    }

}


