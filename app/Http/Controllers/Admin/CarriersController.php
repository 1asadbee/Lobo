<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarrierRequest;
use App\Http\Requests\StoreCarrierRequest;
use App\Http\Requests\UpdateCarrierRequest;
use App\Models\Carrier;
use App\Models\DeliveryType;
use App\Models\TrailerSize;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarriersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carrier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carriers = Carrier::with(['user', 'vehicle_model', 'delivery_type', 'vehicle_type', 'trailer_size'])->get();

        return view('admin.carriers.index', compact('carriers'));
    }

    public function create()
    {
        abort_if(Gate::denies('carrier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_models = VehicleModel::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $delivery_types = DeliveryType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_types = VehicleType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trailer_sizes = TrailerSize::pluck('height', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carriers.create', compact('delivery_types', 'trailer_sizes', 'users', 'vehicle_models', 'vehicle_types'));
    }

    public function store(StoreCarrierRequest $request)
    {
        $carrier = Carrier::create($request->all());

        return redirect()->route('admin.carriers.index');
    }

    public function edit(Carrier $carrier)
    {
        abort_if(Gate::denies('carrier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_models = VehicleModel::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $delivery_types = DeliveryType::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle_types = Vehicle::pluck('name_ru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trailer_sizes = TrailerSize::pluck('height', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carrier->load('user', 'vehicle_model', 'delivery_type', 'vehicle_type', 'trailer_size');

        return view('admin.carriers.edit', compact('carrier', 'delivery_types', 'trailer_sizes', 'users', 'vehicle_models', 'vehicle_types'));
    }

    public function update(UpdateCarrierRequest $request, Carrier $carrier)
    {
        $carrier->update($request->all());

        return redirect()->route('admin.carriers.index');
    }

    public function show(Carrier $carrier)
    {
        abort_if(Gate::denies('carrier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrier->load('user', 'vehicle_model', 'delivery_type', 'vehicle_type', 'trailer_size');

        return view('admin.carriers.show', compact('carrier'));
    }

    public function destroy(Carrier $carrier)
    {
        abort_if(Gate::denies('carrier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrier->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarrierRequest $request)
    {
        Carrier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
