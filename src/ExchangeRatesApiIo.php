<?php

namespace Alzpk\ExchangeRatesApiIo;

/**
 * @method array latest(string $base = 'EUR', string $symbols = '') - Symbols should be formatted like USD,GBP,EUR
 * @method array historical(string $date, string $base = 'EUR', string $symbols = '') - Symbols should be formatted like USD,GBP,EUR
 * @method array history(string $startAt, string $endAt, string $base = 'EUR', string $symbols = '') - Symbols should be formatted like USD,GBP,EUR
 */

class ExchangeRatesApiIo
{

    /**
     * Constant that contains the base uri.
     */
    CONST baseUri = 'https://api.exchangeratesapi.io';

    private $endpoints;
    private $endpoint;

    public function __construct()
    {
        $this->endpoints = include __DIR__ . '/endpoints.php';
    }

    public function __call($name, $arguments)
    {
        if(isset($this->endpoints[$name])) {
            $this->endpoint = $this->endpoints[$name];
            $this->endpoint['arguments'] = $arguments;
            return $this;
        }

        throw new \Exception('Call to undefined method ' . $name);
    }

    public function get()
    {
        $uri = $this->endpoint['uri'];

        if(isset($this->endpoint['params']) && !empty($this->endpoint['params'])) {
            foreach ($this->endpoint['arguments'] as $key => $argument) {
                $search = '{' . $key . '}';
                $replace = $argument;
                $uri = str_replace($search, $replace, $uri);
            }
            foreach ($this->endpoint['params'] as $key => $param) {
                $search = '{' . $key . '}';
                $replace = '';
                $uri = str_replace($search, $replace, $uri);
            }
        }

        $url = self::baseUri . '/' . $uri;
        $json = file_get_contents($url);

        return json_decode($json, true);
    }

}
