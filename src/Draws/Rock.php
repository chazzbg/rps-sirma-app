<?php
/**
 * Created by PhpStorm.
 * User: chazz
 * Date: 04.10.17
 * Time: 19:22
 *
 */

namespace App\Draws;


class Rock implements Draw {

    public function beats(): array {
        return [ Scisssors::class ];
    }
}