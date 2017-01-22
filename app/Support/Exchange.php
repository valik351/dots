<?php

/**
 * Created by PhpStorm.
 * User: Valentine
 * Date: 22.01.17
 * Time: 17:08
 */

namespace App\Support;

class Exchange {
    const USD = 2;
    const EUR = 0;

    public static function rate($currency = self::USD) {
        $exchange = \Session::get('cache_exchange');
        if(!$exchange || $exchange['expire_at'] < time()) {
            $exchange['data'] = json_decode(file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5'));
            $exchange['expire_at'] = time() + 24 * 60 * 60;

            \Session::put('cache_exchange', $exchange);
        }

        return $exchange['data'][$currency]->sale;
    }

}