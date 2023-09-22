<?php

function searchCityTime($city_name)
{
    require('config/cities.php');

    foreach ($cities as $city) {
        //変数citiesを一次元配列に変換

        if ($city['name'] === $city_name) {
            //$city_name（result.php 東京)が一次元配列$cityのキー['name']と一致したとき、
            $date_time = new DateTime('', new DateTimeZone($city['time_zone']));
            //新しい変数$date_timeに現在時刻・タイムゾーンを代入
            $time = $date_time->format('H:i');
            //新しい変数$timeに$date_timeのフォーマット指定したものを代入
            $city['time'] = $time;
            //一次元配列cityに追加、キーは['time']、valueは一行前の$time
            //つまり、$cityの中のキーは['name']と['time']になった
            return $city;
        }
    }
}
