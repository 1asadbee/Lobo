@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carrierPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carrier-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.id') }}
                        </th>
                        <td>
                            {{ $carrierPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.user') }}
                        </th>
                        <td>
                            {{ $carrierPost->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.from') }}
                        </th>
                        <td>
                            {{ $carrierPost->from->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.to') }}
                        </th>
                        <td>
                            {{ $carrierPost->to->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $carrierPost->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.departure_time') }}
                        </th>
                        <td>
                            {{ $carrierPost->departure_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.free_weight') }}
                        </th>
                        <td>
                            {{ $carrierPost->free_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.free_area') }}
                        </th>
                        <td>
                            {{ $carrierPost->free_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.price') }}
                        </th>
                        <td>
                            {{ $carrierPost->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPost.fields.currency') }}
                        </th>
                        <td>
                            {{ $carrierPost->currency->name_ru ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carrier-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection