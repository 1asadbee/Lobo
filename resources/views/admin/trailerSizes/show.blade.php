@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trailerSize.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trailer-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trailerSize.fields.id') }}
                        </th>
                        <td>
                            {{ $trailerSize->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trailerSize.fields.user') }}
                        </th>
                        <td>
                            {{ $trailerSize->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trailerSize.fields.weight') }}
                        </th>
                        <td>
                            {{ $trailerSize->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trailerSize.fields.height') }}
                        </th>
                        <td>
                            {{ $trailerSize->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trailerSize.fields.width') }}
                        </th>
                        <td>
                            {{ $trailerSize->width }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trailerSize.fields.length') }}
                        </th>
                        <td>
                            {{ $trailerSize->length }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trailer-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection