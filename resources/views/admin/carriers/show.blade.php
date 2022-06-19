@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carrier.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carriers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.id') }}
                        </th>
                        <td>
                            {{ $carrier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.user') }}
                        </th>
                        <td>
                            {{ $carrier->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.vehicle_model') }}
                        </th>
                        <td>
                            {{ $carrier->vehicle_model->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.delivery_type') }}
                        </th>
                        <td>
                            {{ $carrier->delivery_type->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.vehicle_type') }}
                        </th>
                        <td>
                            {{ $carrier->vehicle_type->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.vehicle_number') }}
                        </th>
                        <td>
                            {{ $carrier->vehicle_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.trailer_size') }}
                        </th>
                        <td>
                            {{ $carrier->trailer_size->height ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carriers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection