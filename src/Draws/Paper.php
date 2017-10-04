<?php

namespace App\Draws;


class Paper implements Draw {


    public function beats(): array {
        return [ Rock::class ];
    }
}