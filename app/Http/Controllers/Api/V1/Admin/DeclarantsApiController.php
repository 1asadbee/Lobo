<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeclarantRequest;
use App\Http\Requests\UpdateDeclarantRequest;
use App\Http\Resources\Admin\DeclarantResource;
use App\Models\Declarant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeclarantsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('declarant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeclarantResource(Declarant::with(['user'])->get());
    }

    public function store(StoreDeclarantRequest $request)
    {
        $declarant = Declarant::create($request->all());

        return (new DeclarantResource($declarant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Declarant $declarant)
    {
        abort_if(Gate::denies('declarant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeclarantResource($declarant->load(['user']));
    }

    public function update(UpdateDeclarantRequest $request, Declarant $declarant)
    {
        $declarant->update($request->all());

        return (new DeclarantResource($declarant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Declarant $declarant)
    {
        abort_if(Gate::denies('declarant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
