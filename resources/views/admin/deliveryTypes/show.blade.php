@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.deliveryType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.delivery-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryType.fields.id') }}
                        </th>
                        <td>
                            {{ $deliveryType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryType.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $deliveryType->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryType.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $deliveryType->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryType.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $deliveryType->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryType.fields.name_en') }}
                        </th>
                        <td>
                            {{ $deliveryType->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryType.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $deliveryType->name_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deliveryType.fields.image') }}
                        </th>
                        <td>
                            @if($deliveryType->image)
                                <a href="{{ $deliveryType->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $deliveryType->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.delivery-types.index') }}">
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
            <a class="nav-link" href="#delivery_type_vehicles" role="tab" data-toggle="tab">
                {{ trans('cruds.vehicle.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#delivery_type_carriers" role="tab" data-toggle="tab">
                {{ trans('cruds.carrier.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#delivery_type_customer_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.customerPost.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="delivery_type_vehicles">
            @includeIf('admin.deliveryTypes.relationships.deliveryTypeVehicles', ['vehicles' => $deliveryType->deliveryTypeVehicles])
        </div>
        <div class="tab-pane" role="tabpanel" id="delivery_type_carriers">
            @includeIf('admin.deliveryTypes.relationships.deliveryTypeCarriers', ['carriers' => $deliveryType->deliveryTypeCarriers])
        </div>
        <div class="tab-pane" role="tabpanel" id="delivery_type_customer_posts">
            @includeIf('admin.deliveryTypes.relationships.deliveryTypeCustomerPosts', ['customerPosts' => $deliveryType->deliveryTypeCustomerPosts])
        </div>
    </div>
</div>

@endsection