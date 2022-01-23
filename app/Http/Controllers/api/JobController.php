<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
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
        Company::query()->find(1)->toArray();
        return response()->json($this->elastic->search(['index' => 'jobs']));
    }

    /**
     * Search via ElasticSearch
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {

        $match = [];
        $perPage = 10;
        $page = $request->input('page', 1);

        if ($request->has('loc')) {
            $match[] = [
                    'match' => [
                    'province' => $request->input('loc')
                ]
            ];
        }

        if ($request->has('locId')) {
            $match[] = [
                    'term' => [
                    'province_id' => $request->input('locId')
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
                        'should' => $match
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