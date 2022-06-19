@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.city.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.id') }}
                        </th>
                        <td>
                            {{ $city->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $city->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $city->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $city->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.name_en') }}
                        </th>
                        <td>
                            {{ $city->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $city->name_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Latitude
                        </th>
                        <td>
                            {{ $city->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Longitude
                        </th>
                        <td>
                            {{ $city->longitude }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection