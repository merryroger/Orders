<?php
/**
 * Created by PhpStorm.
 * User: Ehwaz Raido
 * Date: 23.12.2018
 * Time: 21:04
 */

namespace App\Console;

use Illuminate\Support\Facades\Cache;

class CacheControls
{

    public function __invoke()
    {
        Cache::flush();
    }

}