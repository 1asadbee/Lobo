@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.phoneNumber.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.phone-numbers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.phoneNumber.fields.id') }}
                        </th>
                        <td>
                            {{ $phoneNumber->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.phoneNumber.fields.user') }}
                        </th>
                        <td>
                            {{ $phoneNumber->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.phoneNumber.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $phoneNumber->phone_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.phone-numbers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection