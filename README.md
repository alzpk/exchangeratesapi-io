# Exchangeratesapi.io API PHP wrapper
A simple PHP wrapper for exchangeratesapi.io's API.

_Example of usage_
```
<?php

require_once './vendor/autoload.php';

$exchangeRatesApiIo = new \Alzpk\ExchangeRatesApiIo\ExchangeRatesApiIo();

print_r($exchangeRatesApiIo->latest('EUR', 'USD,GBP')->get());
```
