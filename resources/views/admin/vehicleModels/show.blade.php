@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicleModel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-models.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleModel.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicleModel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleModel.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $vehicleModel->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleModel.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $vehicleModel->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleModel.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $vehicleModel->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleModel.fields.name_en') }}
                        </th>
                        <td>
                            {{ $vehicleModel->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleModel.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $vehicleModel->name_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleModel.fields.image') }}
                        </th>
                        <td>
                            @if($vehicleModel->image)
                                <a href="{{ $vehicleModel->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $vehicleModel->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-models.index') }}">
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
            <a class="nav-link" href="#vehicle_model_carriers" role="tab" data-toggle="tab">
                {{ trans('cruds.carrier.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vehicle_model_carriers">
            @includeIf('admin.vehicleModels.relationships.vehicleModelCarriers', ['carriers' => $vehicleModel->vehicleModelCarriers])
        </div>
    </div>
</div>

@endsection