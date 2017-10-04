<?php

namespace App;


use App\Exception\EvenException;

class Game {

    /** @var int */
    protected $rounds;

    public function playRounds( $rounds ) {
        $this->rounds = $rounds;
    }

    public function play() {

        $bob   = new Player( 'Bob' );
        $alice = new Player( 'Alice' );

        $dealer = new Dealer(
            $bob,
            $alice
        );

        $winner = [];

        for ( $i = 0; $i < $this->rounds; $i ++ ) {
            try {
                $winner[] = $dealer->draw()->getName();
            } catch ( EvenException $e ) {
                $i --;
            }
        }

        $winner = array_keys( array_count_values( $winner ));
        echo 'Winner is ' . array_shift( $winner );
    }
}
