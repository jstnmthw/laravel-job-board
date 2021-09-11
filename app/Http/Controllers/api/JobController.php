<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JobController extends Controller
{

    private Client $esClient;

    public function __construct() {
        $this->esClient = ClientBuilder::create()
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
        return response()->json($this->esClient->search(['index' => 'jobs']));
    }

    public function search(Request $request): JsonResponse
    {
        $params = [
            'index' => 'jobs',
            'body'  => [
                'query' => [
                    'bool' => [
                        'should' => [
                            [ 'match' => [ 'title' => $request->input('q', '') ] ],
                            [ 'match' => [ 'description' => $request->input('q', '') ] ],
                        ]
                    ]
                ]
            ]
        ];
        $data = $this->esClient->search($params);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
