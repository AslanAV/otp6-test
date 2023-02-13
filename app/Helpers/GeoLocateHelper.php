<?php

namespace App\Helpers;



use MoveMoveIo\DaData\DaDataAddress;

class GeoLocateHelper
{
    public static function getAdressFromGeo(array $geo)
    {
        try {
            $dadata = (new DaDataAddress)->geolocate($geo['geo_lat'], $geo['geo_lon'], 2, 1000);

        } catch (\Exception $e) {
            return "Уточните адрес.";
        }
        return array_key_exists('0', $dadata['suggestions']) ? $dadata['suggestions']['0']['value'] : "Уточните адрес.";
    }
}
