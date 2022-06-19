<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoadTypeRequest;
use App\Http\Requests\UpdateLoadTypeRequest;
use App\Http\Resources\Admin\LoadTypeResource;
use App\Models\LoadType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoadTypesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('load_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoadTypeResource(LoadType::all());
    }

    public function store(StoreLoadTypeRequest $request)
    {
        $loadType = LoadType::create($request->all());

        return (new LoadTypeResource($loadType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LoadType $loadType)
    {
        abort_if(Gate::denies('load_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoadTypeResource($loadType);
    }

    public function update(UpdateLoadTypeRequest $request, LoadType $loadType)
    {
        $loadType->update($request->all());

        return (new LoadTypeResource($loadType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LoadType $loadType)
    {
        abort_if(Gate::denies('load_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loadType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
