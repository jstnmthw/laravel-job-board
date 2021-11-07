<?php

namespace App\Indexes;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class JobIndex extends IndexConfigurator
{
    use Migratable;

    // Index name
    protected $name = 'jobs';

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
                    ],
                ],
                'autocomplete_search' => [
                    'tokenizer' => 'lowercase',
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