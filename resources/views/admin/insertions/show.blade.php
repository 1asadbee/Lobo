@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.insertion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insertions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.insertion.fields.id') }}
                        </th>
                        <td>
                            {{ $insertion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insertion.fields.user') }}
                        </th>
                        <td>
                            {{ $insertion->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insertion.fields.given_money') }}
                        </th>
                        <td>
                            {{ $insertion->given_money }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insertion.fields.currency') }}
                        </th>
                        <td>
                            {{ $insertion->currency->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.insertion.fields.taken_coins') }}
                        </th>
                        <td>
                            {{ $insertion->taken_coins }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.insertions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection