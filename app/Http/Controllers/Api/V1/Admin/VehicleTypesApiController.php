<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVehicleTypeRequest;
use App\Http\Requests\UpdateVehicleTypeRequest;
use App\Http\Resources\Admin\VehicleTypeResource;
use App\Models\VehicleType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleTypesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleTypeResource(VehicleType::with(['vehicle'])->get());
    }

    public function store(StoreVehicleTypeRequest $request)
    {
        $vehicleType = VehicleType::create($request->all());

        if ($request->input('image', false)) {
            $vehicleType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new VehicleTypeResource($vehicleType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VehicleType $vehicleType)
    {
        abort_if(Gate::denies('vehicle_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleTypeResource($vehicleType->load(['vehicle']));
    }

    public function update(UpdateVehicleTypeRequest $request, VehicleType $vehicleType)
    {
        $vehicleType->update($request->all());

        if ($request->input('image', false)) {
            if (!$vehicleType->image || $request->input('image') !== $vehicleType->image->file_name) {
                if ($vehicleType->image) {
                    $vehicleType->image->delete();
                }
                $vehicleType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($vehicleType->image) {
            $vehicleType->image->delete();
        }

        return (new VehicleTypeResource($vehicleType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VehicleType $vehicleType)
    {
        abort_if(Gate::denies('vehicle_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
