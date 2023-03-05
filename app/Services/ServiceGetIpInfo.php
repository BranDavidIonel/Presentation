<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class ServiceGetIpInfo
{
    private array $allData = [];
    private const IP = 'ip';
    private const CITY = 'city';
    private const REGION = 'region';
    private const COUNTRY = 'country';
    private const LATITUDE = 'latitude';
    private const  LONGITUDE = 'longitude';

    public function __construct()
    {
        $client = new Client();
        $ipAddress = $this->getPublicIpAddress();
        $url = "https://ipinfo.io/{$ipAddress}/json";
        $response = $client->request('GET', $url);
        $data = json_decode($response->getBody(), true);
        //dd($data);
        $loc = Arr::get($data, 'loc', false);
        $this->allData = [
            self::IP => Arr::get($data, self::IP, ''),
            self::CITY => Arr::get($data, self::CITY, ''),
            self::REGION => Arr::get($data, self::REGION, ''),
            self::COUNTRY => Arr::get($data, self::COUNTRY),
            self::LATITUDE => $loc ? explode(',', $loc)[0] : null,
            self::LONGITUDE => $loc ? explode(',', $loc)[1] : null
        ];
    }

    private function getPublicIpAddress()
    {
        $client = new Client();
        $url = "https://api.ipify.org?format=json";
        $response = $client->request('GET', $url);
        $data = json_decode($response->getBody(), true);
        return $data['ip'];
    }

    public function getAllInfo(): array
    {
        return $this->allData;
    }

    public function getCity()
    {
        return $this->allData[self::CITY];
    }

    public function getCountry()
    {
        return $this->allData[self::COUNTRY];
    }

}
