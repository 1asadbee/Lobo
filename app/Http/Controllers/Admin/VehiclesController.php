<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleRequest;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\DeliveryType;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VehiclesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::with(['delivery_type', 'media'])->get();

        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivery_types = DeliveryType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicles.create', compact('delivery_types'));
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());

        if ($request->input('image', false)) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicle->id]);
        }

        return redirect()->route('admin.vehicles.index');
    }

    public function edit(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivery_types = DeliveryType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle->load('delivery_type');

        return view('admin.vehicles.edit', compact('delivery_types', 'vehicle'));
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

        return redirect()->route('admin.vehicles.index');
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->load('delivery_type', 'vehicleVehicleTypes', 'vehicleTypeCarriers');

        return view('admin.vehicles.show', compact('vehicle'));
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleRequest $request)
    {
        Vehicle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_create') && Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vehicle();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
