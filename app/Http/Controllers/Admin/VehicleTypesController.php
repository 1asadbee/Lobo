<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleTypeRequest;
use App\Http\Requests\StoreVehicleTypeRequest;
use App\Http\Requests\UpdateVehicleTypeRequest;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VehicleTypesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleTypes = VehicleType::with(['vehicle', 'media'])->get();

        return view('admin.vehicleTypes.index', compact('vehicleTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicleTypes.create', compact('vehicles'));
    }

    public function store(StoreVehicleTypeRequest $request)
    {
        $vehicleType = VehicleType::create($request->all());

        if ($request->input('image', false)) {
            $vehicleType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicleType->id]);
        }

        return redirect()->route('admin.vehicle-types.index');
    }

    public function edit(VehicleType $vehicleType)
    {
        abort_if(Gate::denies('vehicle_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicleType->load('vehicle');

        return view('admin.vehicleTypes.edit', compact('vehicleType', 'vehicles'));
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

        return redirect()->route('admin.vehicle-types.index');
    }

    public function show(VehicleType $vehicleType)
    {
        abort_if(Gate::denies('vehicle_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleType->load('vehicle', 'vehicleTypeCustomerPosts');

        return view('admin.vehicleTypes.show', compact('vehicleType'));
    }

    public function destroy(VehicleType $vehicleType)
    {
        abort_if(Gate::denies('vehicle_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleType->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleTypeRequest $request)
    {
        VehicleType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_type_create') && Gate::denies('vehicle_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VehicleType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
