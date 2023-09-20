<?php

namespace App\parser;

class CurlHelper {
    public static function getHtmlPage($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($curl);
        curl_close($curl);
        return $html;
    }
}
