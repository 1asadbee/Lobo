<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrailerSizeRequest;
use App\Http\Requests\UpdateTrailerSizeRequest;
use App\Http\Resources\Admin\TrailerSizeResource;
use App\Models\TrailerSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrailerSizeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trailer_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrailerSizeResource(TrailerSize::with(['user'])->get());
    }

    public function store(StoreTrailerSizeRequest $request)
    {
        $trailerSize = TrailerSize::create($request->all());

        return (new TrailerSizeResource($trailerSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TrailerSize $trailerSize)
    {
        abort_if(Gate::denies('trailer_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TrailerSizeResource($trailerSize->load(['user']));
    }

    public function update(UpdateTrailerSizeRequest $request, TrailerSize $trailerSize)
    {
        $trailerSize->update($request->all());

        return (new TrailerSizeResource($trailerSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TrailerSize $trailerSize)
    {
        abort_if(Gate::denies('trailer_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trailerSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
