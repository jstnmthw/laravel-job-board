<?php

namespace App\Indexes;

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
                    'min_gram' => 1,
                    'max_gram' => 8,
                    'token_chars' => [
                        'letter',
                        'digit'
                    ]
                ]
            ]
        ]
    ];
}