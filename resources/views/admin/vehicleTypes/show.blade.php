@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicleType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicleType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.vehicle') }}
                        </th>
                        <td>
                            {{ $vehicleType->vehicle->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $vehicleType->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $vehicleType->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $vehicleType->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.name_en') }}
                        </th>
                        <td>
                            {{ $vehicleType->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $vehicleType->name_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicleType.fields.image') }}
                        </th>
                        <td>
                            @if($vehicleType->image)
                                <a href="{{ $vehicleType->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $vehicleType->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicle-types.index') }}">
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
            <a class="nav-link" href="#vehicle_type_customer_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.customerPost.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vehicle_type_customer_posts">
            @includeIf('admin.vehicleTypes.relationships.vehicleTypeCustomerPosts', ['customerPosts' => $vehicleType->vehicleTypeCustomerPosts])
        </div>
    </div>
</div>

@endsection