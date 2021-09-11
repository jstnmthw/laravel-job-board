<?php

return [
    'client' => [
        'hosts' => [
            env('SCOUT_ELASTIC_HOST',env('ELASTIC_USER').':'.env('ELASTIC_PASSWORD').'@'.env('ELASTIC_HOST').':'.env('ELASTIC_HOST_HTTP_PORT')),
        ],
    ],
    'update_mapping' => env('SCOUT_ELASTIC_UPDATE_MAPPING', true),
    'indexer' => env('SCOUT_ELASTIC_INDEXER', 'single'),
    'document_refresh' => env('SCOUT_ELASTIC_DOCUMENT_REFRESH'),
];
