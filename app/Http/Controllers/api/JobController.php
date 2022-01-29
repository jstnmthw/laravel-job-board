<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class JobController extends Controller
{

    private Client $elastic;

    public function __construct()
    {
        $this->elastic = ClientBuilder::create()
            ->setHosts(config('app.elastic_host'))
            ->build();
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->elastic->search(['index' => 'jobs']));
    }

    /**
     * Search jobs via ElasticSearch
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {

        $should = [];
        $must = [];
        $perPage = 10;
        $page = $request->input('page', 1);

        if ($request->has('locId')) {
            $must[] = [
                    'term' => [
                    'province_id' => $request->input('locId')
                ]
            ];
        }

        if ($request->has('search')) {
            $must[] =  [
                'match' => [
                    'title' => $request->input('search')
                ]
            ];
            $should[] = [
                'match' => [
                    'description' => $request->input('search')
                ]
            ];
        }

        $params = [
            'index' => 'jobs',
            'track_total_hits' => true,
            'size' => $perPage,
            'from' => $perPage * ($page - 1),
            'body' => [
                'query' => [
                    'bool' => [
                        'should' => $should,
                        'must' => $must
                    ]
                ]
            ]
        ];

        $data = $this->elastic->search($params);

        $total = 0;
        if ($data['hits']['total']['value'] > 0) {
           $total = $data['hits']['total']['value'];
        } else {
            abort(404);
        }

        $items = [];
        foreach ($data['hits']['hits'] as $key => $value) {
            $items[$key] = $value['_source'];
        }

        $paginate = new LengthAwarePaginator($items, $total, $perPage, $page);

        return response()->json($paginate);
    }
}