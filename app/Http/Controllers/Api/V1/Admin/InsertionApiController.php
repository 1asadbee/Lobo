<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInsertionRequest;
use App\Http\Requests\UpdateInsertionRequest;
use App\Http\Resources\Admin\InsertionResource;
use App\Models\Insertion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InsertionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('insertion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InsertionResource(Insertion::with(['user', 'currency'])->get());
    }

    public function store(StoreInsertionRequest $request)
    {
        $insertion = Insertion::create($request->all());

        return (new InsertionResource($insertion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Insertion $insertion)
    {
        abort_if(Gate::denies('insertion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InsertionResource($insertion->load(['user', 'currency']));
    }

    public function update(UpdateInsertionRequest $request, Insertion $insertion)
    {
        $insertion->update($request->all());

        return (new InsertionResource($insertion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Insertion $insertion)
    {
        abort_if(Gate::denies('insertion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insertion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
