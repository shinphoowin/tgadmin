<?php

namespace App\Http\Traits;

trait RequestTrait
{
    private function apiRequest($method, $parameters = [])
    {
        $url = 'https://api.telegram.org/bot' . env("TELEGRAM_TOKEN") . "/" . $method;
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($handle, CURLOPT_TIMEOUT, 60);
        curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($parameters));
        $response = curl_exec($handle);
        //print_r($response);

        if ($response === false) {
            curl_close($handle);
            return false;
        }
        curl_close($handle);
        $response = json_decode($response, true);
        //dd($response);
        if ($response['ok'] == false) {
            return false;
        }
        $response = $response['result'];
        return $response;
    }
}
