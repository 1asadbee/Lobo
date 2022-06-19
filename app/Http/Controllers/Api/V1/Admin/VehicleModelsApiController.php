<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVehicleModelRequest;
use App\Http\Requests\UpdateVehicleModelRequest;
use App\Http\Resources\Admin\VehicleModelResource;
use App\Models\VehicleModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleModelsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleModelResource(VehicleModel::all());
    }

    public function store(StoreVehicleModelRequest $request)
    {
        $vehicleModel = VehicleModel::create($request->all());

        if ($request->input('image', false)) {
            $vehicleModel->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new VehicleModelResource($vehicleModel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VehicleModel $vehicleModel)
    {
        abort_if(Gate::denies('vehicle_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleModelResource($vehicleModel);
    }

    public function update(UpdateVehicleModelRequest $request, VehicleModel $vehicleModel)
    {
        $vehicleModel->update($request->all());

        if ($request->input('image', false)) {
            if (!$vehicleModel->image || $request->input('image') !== $vehicleModel->image->file_name) {
                if ($vehicleModel->image) {
                    $vehicleModel->image->delete();
                }
                $vehicleModel->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($vehicleModel->image) {
            $vehicleModel->image->delete();
        }

        return (new VehicleModelResource($vehicleModel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VehicleModel $vehicleModel)
    {
        abort_if(Gate::denies('vehicle_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleModel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
