<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeclarantsDescriptionRequest;
use App\Http\Requests\UpdateDeclarantsDescriptionRequest;
use App\Http\Resources\Admin\DeclarantsDescriptionResource;
use App\Models\DeclarantsDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeclarantsDescriptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('declarants_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeclarantsDescriptionResource(DeclarantsDescription::with(['declarant'])->get());
    }

    public function store(StoreDeclarantsDescriptionRequest $request)
    {
        $declarantsDescription = DeclarantsDescription::create($request->all());

        return (new DeclarantsDescriptionResource($declarantsDescription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DeclarantsDescription $declarantsDescription)
    {
        abort_if(Gate::denies('declarants_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeclarantsDescriptionResource($declarantsDescription->load(['declarant']));
    }

    public function update(UpdateDeclarantsDescriptionRequest $request, DeclarantsDescription $declarantsDescription)
    {
        $declarantsDescription->update($request->all());

        return (new DeclarantsDescriptionResource($declarantsDescription))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeclarantsDescription $declarantsDescription)
    {
        abort_if(Gate::denies('declarants_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $declarantsDescription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
