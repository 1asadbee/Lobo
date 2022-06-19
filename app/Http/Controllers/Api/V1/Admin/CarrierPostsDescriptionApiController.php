<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarrierPostsDescriptionRequest;
use App\Http\Requests\UpdateCarrierPostsDescriptionRequest;
use App\Http\Resources\Admin\CarrierPostsDescriptionResource;
use App\Models\CarrierPostsDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarrierPostsDescriptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carrier_posts_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarrierPostsDescriptionResource(CarrierPostsDescription::with(['carrier_post'])->get());
    }

    public function store(StoreCarrierPostsDescriptionRequest $request)
    {
        $carrierPostsDescription = CarrierPostsDescription::create($request->all());

        return (new CarrierPostsDescriptionResource($carrierPostsDescription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CarrierPostsDescription $carrierPostsDescription)
    {
        abort_if(Gate::denies('carrier_posts_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarrierPostsDescriptionResource($carrierPostsDescription->load(['carrier_post']));
    }

    public function update(UpdateCarrierPostsDescriptionRequest $request, CarrierPostsDescription $carrierPostsDescription)
    {
        $carrierPostsDescription->update($request->all());

        return (new CarrierPostsDescriptionResource($carrierPostsDescription))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CarrierPostsDescription $carrierPostsDescription)
    {
        abort_if(Gate::denies('carrier_posts_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPostsDescription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
