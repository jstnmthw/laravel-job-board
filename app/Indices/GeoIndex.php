<?php

namespace App\Indices;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class GeoIndex extends IndexConfigurator
{
    use Migratable;

    // Index name
    protected $name = 'geo';

    /**
     * @var array
     */
    protected $settings = [
        'analysis' => [
            'analyzer' => [
                'autocomplete' => [
                    'tokenizer' => 'autocomplete',
                    'filter' => [
                        'lowercase',
                        'truncate'
                    ]
                ],
                'autocomplete_search' => [
                    'tokenizer' => 'lowercase'
                ]
            ],
            'tokenizer' => [
                'autocomplete' => [
                    'type' => 'edge_ngram',
                    'min_gram' => 3,
                    'max_gram' => 20,
                    'token_chars' => [
                        'letter',
                        'digit'
                    ]
                ]
            ]
        ]
    ];
}