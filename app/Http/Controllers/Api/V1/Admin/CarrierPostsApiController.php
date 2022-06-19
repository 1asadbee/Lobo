<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarrierPostRequest;
use App\Http\Requests\UpdateCarrierPostRequest;
use App\Http\Resources\Admin\CarrierPostResource;
use App\Models\CarrierPost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarrierPostsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carrier_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarrierPostResource(CarrierPost::with(['user', 'from', 'to', 'currency'])->get());
    }

    public function store(StoreCarrierPostRequest $request)
    {
        $carrierPost = CarrierPost::create($request->all());

        return (new CarrierPostResource($carrierPost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CarrierPost $carrierPost)
    {
        abort_if(Gate::denies('carrier_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarrierPostResource($carrierPost->load(['user', 'from', 'to', 'currency']));
    }

    public function update(UpdateCarrierPostRequest $request, CarrierPost $carrierPost)
    {
        $carrierPost->update($request->all());

        return (new CarrierPostResource($carrierPost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CarrierPost $carrierPost)
    {
        abort_if(Gate::denies('carrier_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrierPost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
