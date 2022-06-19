@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicle.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicle->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.delivery_type') }}
                        </th>
                        <td>
                            {{ $vehicle->delivery_type->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $vehicle->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $vehicle->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $vehicle->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.name_en') }}
                        </th>
                        <td>
                            {{ $vehicle->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $vehicle->name_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.image') }}
                        </th>
                        <td>
                            @if($vehicle->image)
                                <a href="{{ $vehicle->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $vehicle->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#vehicle_vehicle_types" role="tab" data-toggle="tab">
                {{ trans('cruds.vehicleType.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vehicle_type_carriers" role="tab" data-toggle="tab">
                {{ trans('cruds.carrier.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vehicle_vehicle_types">
            @includeIf('admin.vehicles.relationships.vehicleVehicleTypes', ['vehicleTypes' => $vehicle->vehicleVehicleTypes])
        </div>
        <div class="tab-pane" role="tabpanel" id="vehicle_type_carriers">
            @includeIf('admin.vehicles.relationships.vehicleTypeCarriers', ['carriers' => $vehicle->vehicleTypeCarriers])
        </div>
    </div>
</div>

@endsection