<?php

namespace TypiCMS\Modules\Translations\Http\Controllers;

use Illuminate\Support\Facades\Request;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Translations\Repositories\TranslationInterface as Repository;

class ApiController extends BaseApiController
{
    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Get models.
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index()
    {
        $models = $this->repository->all([], true);

        return response()->json($models, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $model = $this->repository->create(Request::all());
        $error = $model ? false : true;

        return response()->json([
            'error' => $error,
            'model' => $model,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $model
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($model)
    {
        $error = $this->repository->update(Request::all()) ? false : true;

        return response()->json([
            'error' => $error,
        ], 200);
    }
}
