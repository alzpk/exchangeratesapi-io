<?php

return [
    'latest' => [
        'method' => 'latest',
        'uri' => 'latest?base={0}&symbols={1}',
        'params' => [
            'base',
            'symbols'
        ]
    ],
    'historical' => [
        'method' => 'historical',
        'uri' => '{0}?base={1}&symbols={2}',
        'params' => [
            'date',
            'base',
            'symbols'
        ]
    ],
    'history' => [
        'method' => 'history',
        'uri' => 'history?start_at={0}&end_at={1}&base={2}&symbols={3}',
        'params' => [
            'startAt',
            'endAt',
            'base',
            'symbols'
        ]
    ],
];
