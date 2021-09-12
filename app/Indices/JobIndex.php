<?php

namespace App\Indices;

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
                'edge_ngram_analyzer' => [
                    'filter' => ['lowercase'],
                    'tokenizer' => 'edge_ngram_tokenizer'
                ],
                'edge_ngram_search_analyzer' => [
                    'tokenizer' => 'lowercase'
                ]
            ],
            'tokenizer' => [
                'edge_ngram_tokenizer' => [
                    'type' => 'edge_ngram',
                    'min_gram' => 3,
                    'max_gram' => 20,
                    'token_chars' => [
                        'letter'
                    ]
                ]
            ]
        ]
    ];
}