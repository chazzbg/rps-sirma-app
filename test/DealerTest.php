<?php

use App\Dealer;

class DealerTest extends PHPUnit_Framework_TestCase {

    public function testDrawPlayerOneWins() {

        $player_one = self::createMock( 'App\Player' );
        $player_one->method( 'getName' )->willReturn( 'Bob' );
        $player_one->method( 'draw' )->willReturn( \App\Draws\Rock::class );

        $player_two = self::createMock( 'App\Player' );
        $player_two->method( 'getName' )->willReturn( 'Alice' );
        $player_two->method( 'draw' )->willReturn( \App\Draws\Paper::class );

        $dealer = new Dealer( $player_one, $player_two );

        self::assertEquals( 'Alice', $dealer->draw()->getName() );
    }

    public function testDrawPlayerTwoWins() {

        $player_one = self::createMock( 'App\Player' );
        $player_one->method( 'getName' )->willReturn( 'Bob' );
        $player_one->method( 'draw' )->willReturn( \App\Draws\Scisssors::class );

        $player_two = self::createMock( 'App\Player' );
        $player_two->method( 'getName' )->willReturn( 'Alice' );
        $player_two->method( 'draw' )->willReturn( \App\Draws\Paper::class );

        $dealer = new Dealer( $player_one, $player_two );

        self::assertEquals( 'Bob', $dealer->draw()->getName() );
    }


    /**
     * @expectedException \App\Exception\EvenException
     */
    public function testEvenDraws() {

        $player_one = self::createMock( 'App\Player' );
        $player_one->method( 'getName' )->willReturn( 'Bob' );
        $player_one->method( 'draw' )->willReturn( \App\Draws\Scisssors::class );

        $player_two = self::createMock( 'App\Player' );
        $player_two->method( 'getName' )->willReturn( 'Alice' );
        $player_two->method( 'draw' )->willReturn( \App\Draws\Scisssors::class );

        $dealer = new Dealer( $player_one, $player_two );

        $dealer->draw();
    }
}
