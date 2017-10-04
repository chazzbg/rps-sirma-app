<?php

namespace App;


use App\Draws\Draw;
use App\Exception\EvenException;

class Dealer {

    /**
     * @var Player
     */
    protected $player_one;

    /**
     * @var Player
     */
    protected $player_two;

    public function __construct( Player $player_one, Player $player_two ) {
        $this->player_one = $player_one;
        $this->player_two = $player_two;
    }


    public function draw(): Player {
        /** @var Draw $draw_p_one */
        $draw_p_one_class = $this->player_one->draw();
        $draw_p_one       = new $draw_p_one_class;
        /** @var Draw $draw_p_two */
        $draw_p_two_class = $this->player_two->draw();
        $draw_p_two       = new $draw_p_two_class;

        if ( in_array( $draw_p_two_class, $draw_p_one->beats() ) ) {
            return $this->player_one;
        }

        if ( in_array( $draw_p_one_class, $draw_p_two->beats() ) ) {
            return $this->player_two;
        }

        throw new EvenException('Round is even');
    }
}