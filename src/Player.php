<?php

namespace App;


use App\Draws\Draw;
use App\Draws\Paper;
use App\Draws\Rock;
use App\Draws\Scisssors;

class Player {

    protected $name;

    protected $options = [
        Paper::class,
        Rock::class,
        Scisssors::class
    ];

    /**
     * Player constructor.
     *
     * @param $name
     */
    public function __construct( $name ) {
        $this->name = $name;
    }

    /**
     * @param mixed $name
     */
    public function setName( $name ) {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function draw(): string {
        return $this->options[ random_int( 0, count( $this->options ) - 1 ) ];
    }

    public function __toString() {
        return $this->getName();
    }
}