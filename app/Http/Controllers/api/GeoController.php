<?php

namespace App\Http\Controllers\api;

use App\Models\Geo;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeoController extends \Igaster\LaravelCities\GeoController
{
    /**
     * Search locations on ElasticSearch
     *
     * @param Request $request
     * @param int $limit
     * @return JsonResponse
     */
    public function searchElastic(Request $request, int $limit = 5): JsonResponse
    {
        if (!$request->has('q') || empty($request->input('q'))) {
           abort(404);
        }

        $query = $request->input('q');

        $client = ClientBuilder::create()
            ->setHosts(config('app.elastic_host'))
            ->build();

        $params = [
            'filter_path' => ['hits.hits._source,hits.hits.highlight'],
            'index' => 'geo',
            'size' => $limit,
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            [
                                'match' => [
                                    'name' => [
                                        'query' => $query,
                                        'operator' => 'and'
                                    ],
                                ],
                            ],
                            [
                                'bool' => [
                                    'should' => [
                                        [
                                            'match' => [
                                                'level' => 'ADM1'
                                            ],
                                        ],
                                        [
                                            'match' => [
                                                'level' => 'ADM2'
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'highlight' => [
                    'pre_tags' => ['<b class="font-semibold">'],
                    'post_tags' => ['</b>'],
                    'fields' => [
                        'name' => [
                            'require_field_match' => false,
                        ]
                    ]
                ]
            ]
        ];
        $data = $client->search($params)['hits']['hits'] ?? null;
        return $data ? response()->json($data) : response()->json(null, 404);
    }

    /**
     * Grab the ADM1 level Geo points of a country which usually is
     * considered to be the provinces (or states) of a selected country.
     *
     * @param Request $request
     * @param int $parentId
     * @return JsonResponse
     */
    public function getChildren(Request $request, int $parentId): JsonResponse
    {
        return response()->json(
            Geo::query()
                ->where('parent_id', $parentId)
                ->orderBy('name')
                ->get()
        );
    }
}
