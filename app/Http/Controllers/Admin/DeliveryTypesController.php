<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDeliveryTypeRequest;
use App\Http\Requests\StoreDeliveryTypeRequest;
use App\Http\Requests\UpdateDeliveryTypeRequest;
use App\Models\DeliveryType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DeliveryTypesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('delivery_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryTypes = DeliveryType::with(['media'])->get();

        return view('admin.deliveryTypes.index', compact('deliveryTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('delivery_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.deliveryTypes.create');
    }

    public function store(StoreDeliveryTypeRequest $request)
    {
        $deliveryType = DeliveryType::create($request->all());

        if ($request->input('image', false)) {
            $deliveryType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $deliveryType->id]);
        }

        return redirect()->route('admin.delivery-types.index');
    }

    public function edit(DeliveryType $deliveryType)
    {
        abort_if(Gate::denies('delivery_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.deliveryTypes.edit', compact('deliveryType'));
    }

    public function update(UpdateDeliveryTypeRequest $request, DeliveryType $deliveryType)
    {
        $deliveryType->update($request->all());

        if ($request->input('image', false)) {
            if (!$deliveryType->image || $request->input('image') !== $deliveryType->image->file_name) {
                if ($deliveryType->image) {
                    $deliveryType->image->delete();
                }
                $deliveryType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($deliveryType->image) {
            $deliveryType->image->delete();
        }

        return redirect()->route('admin.delivery-types.index');
    }

    public function show(DeliveryType $deliveryType)
    {
        abort_if(Gate::denies('delivery_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryType->load('deliveryTypeVehicles', 'deliveryTypeCarriers', 'deliveryTypeCustomerPosts');

        return view('admin.deliveryTypes.show', compact('deliveryType'));
    }

    public function destroy(DeliveryType $deliveryType)
    {
        abort_if(Gate::denies('delivery_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryType->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeliveryTypeRequest $request)
    {
        DeliveryType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('delivery_type_create') && Gate::denies('delivery_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DeliveryType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
