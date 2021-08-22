<?php

namespace App\Http\Controllers;

use App\Services\CurlService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Processing data api data
 */
class MainController extends Controller
{
    /** @var string */
    private const API_KEY = '68a7c8c64a81f93c48963f94c71ee16beea62a595bb49bfab73247b7702825ca';
    private const API_URL = 'https://api.ambeedata.com/weather/latest/by-lat-lng?lat=49.8397&lng=24.0297';


    /**
     * Processing weather data with GuzzleHttp
     *
     * @return Application|Factory|View
     * @throws GuzzleException
     */
    public function processApiGuzzle(): object
    {
        $client = new Client();
        $headers = [
            'x-api-key' => self::API_KEY,
            'Content-type' => 'application/json',
        ];
        $response = $client->request('GET', self::API_URL, [
            'headers' => $headers
        ]);

        $result = json_decode($response->getBody()->getContents(), true)['data'];

        $celsius = $this->converToCelsius($result['temperature']);

        return view('weather', [
            'celsius' => $celsius,
            'icon' => $result['icon'],
            'windSpeed' => round($result['windSpeed'], 1),
            'humidity' => $result['humidity'],
            'city' => 'Lviv'
        ]);

    }

    /**
     * Processing weather data with curl http request
     *
     * @return Application|Factory|View
     */
    public function processApiCurl()
    {
        $response = CurlService::getCurl();
        $result = json_decode($response);

        $celsius = $this->converToCelsius($result->data->temperature);
        $icon = $result->data->icon;
        $windSpeed = $result->data->windSpeed;
        $humidity = $result->data->humidity;

        return view('weather', [
            'celsius' => $celsius,
            'icon' => $icon,
            'windSpeed' => round($windSpeed, 1),
            'humidity' => $humidity,
            'city' => 'Kharkiv'
        ]);
    }

    /**
     * Celsius converter helper
     *
     * @param $farengeit
     * @return float
     */
    private function converToCelsius($farengeit): float
    {
        return round(($farengeit - 32) / 1.8);
    }
}
