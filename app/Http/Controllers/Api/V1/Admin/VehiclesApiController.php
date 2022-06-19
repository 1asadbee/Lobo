<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\Admin\VehicleResource;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehiclesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource(Vehicle::with(['delivery_type'])->get());
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());

        if ($request->input('image', false)) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource($vehicle->load(['delivery_type']));
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

        if ($request->input('image', false)) {
            if (!$vehicle->image || $request->input('image') !== $vehicle->image->file_name) {
                if ($vehicle->image) {
                    $vehicle->image->delete();
                }
                $vehicle->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($vehicle->image) {
            $vehicle->image->delete();
        }

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
