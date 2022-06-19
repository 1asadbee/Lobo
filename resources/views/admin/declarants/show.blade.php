@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.declarant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.declarants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.id') }}
                        </th>
                        <td>
                            {{ $declarant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.user') }}
                        </th>
                        <td>
                            {{ $declarant->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.declaration') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->declaration ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.settlement_fee') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->settlement_fee ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.registration_certificate') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->registration_certificate ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.obtaining_license') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->obtaining_license ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.obtaining_permits') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->obtaining_permits ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.unusual_cargo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->unusual_cargo ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.insurance') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->insurance ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.price') }}
                        </th>
                        <td>
                           {{ $declarant->price}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarant.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $declarant->status ? 'checked' : '' }}>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.declarants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
