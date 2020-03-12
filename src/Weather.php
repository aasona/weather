<?php
/**
 * User: yuanHb <1214846385@qq.com>
 * Date: 2020/3/12
 * Time: 15:58.
 */

namespace aasona\weather;

use aasona\weather\Exceptions\HttpException;
use aasona\weather\Exceptions\InvalidArgumentException;
use GuzzleHttp\Client;

class Weather
{
    protected $key;

    protected $guzzleOptions = [];

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    public function getLiveWeather($city, $format = 'json')
    {
        return $this->getWeather($city, 'live', $format);
    }

    public function getForecastsWeather($city, $format = 'json')
    {
        return $this->getWeather($city, 'forecast', $format);
    }

    public function getWeather($city, string $type = 'live', string $format = 'json')
    {
        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';
        $types = [
            'live' => 'base',
            'forecast' => 'all',
        ];
        if (!\in_array(\strtolower($format), ['xml', 'json'])) {
            throw new InvalidArgumentException('Invalid response format: '.$format);
        }
        if (!\array_key_exists(\strtolower($type), $types)) {
            throw new InvalidArgumentException('Invalid type value(live/forecast): '.$type);
        }
        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => $format,
            'extensions' => $types[\strtolower($type)],
        ]);

        try {
            $response = $this->getHttpClient()->get($url, [
                'query' => $query,
            ])->getBody()->getContents();

            return 'json' === $format ? \json_decode($response, true) : $response;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }


}