<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\EmploymentType;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
    public function search(Request $request): ?JsonResponse
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
            $should[] =  [
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
        }

        $items = [];
        foreach ($data['hits']['hits'] as $key => $value) {
            $items[$key] = $value['_source'];
        }

        $paginate = new LengthAwarePaginator($items, $total, $perPage, $page);

        return response()->json($paginate);
    }

    public function getFilters(): JsonResponse
    {
        $data = Collection::make();

        $types = EmploymentType::query()
            ->select(['title'])
            ->get()
            ->pluck('title')
            ->toArray();

        array_splice($types, 0, 0, ['All Job Types']);

        // Employment Types
        $data->put('employmentTypes', $types);

        // Date Range
        $data->put('dateRange', [
            'Posted Any Day',
            'Last Day',
            'Last 3 days',
            'Last Week',
            'Last 2 Weeks',
            'Last Month'
        ]);

        // Salary Range
        $data->put('salaryRange', [
            'Any Salary',
            '10k - 30k',
            '40k - 60k',
            '70k - 90k',
            '100k+',
        ]);

        // Radius
        $data->put('radius', [
            '25 miles',
            '50 miles',
            '100 miles',
        ]);

        return response()->json($data);
    }
}