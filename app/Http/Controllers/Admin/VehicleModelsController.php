<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleModelRequest;
use App\Http\Requests\StoreVehicleModelRequest;
use App\Http\Requests\UpdateVehicleModelRequest;
use App\Models\VehicleModel;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VehicleModelsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleModels = VehicleModel::with(['media'])->get();

        return view('admin.vehicleModels.index', compact('vehicleModels'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_model_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicleModels.create');
    }

    public function store(StoreVehicleModelRequest $request)
    {
        $vehicleModel = VehicleModel::create($request->all());

        if ($request->input('image', false)) {
            $vehicleModel->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicleModel->id]);
        }

        return redirect()->route('admin.vehicle-models.index');
    }

    public function edit(VehicleModel $vehicleModel)
    {
        abort_if(Gate::denies('vehicle_model_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vehicleModels.edit', compact('vehicleModel'));
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

        return redirect()->route('admin.vehicle-models.index');
    }

    public function show(VehicleModel $vehicleModel)
    {
        abort_if(Gate::denies('vehicle_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleModel->load('vehicleModelCarriers');

        return view('admin.vehicleModels.show', compact('vehicleModel'));
    }

    public function destroy(VehicleModel $vehicleModel)
    {
        abort_if(Gate::denies('vehicle_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleModel->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleModelRequest $request)
    {
        VehicleModel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_model_create') && Gate::denies('vehicle_model_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VehicleModel();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
