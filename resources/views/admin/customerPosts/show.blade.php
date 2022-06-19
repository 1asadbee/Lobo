@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.id') }}
                        </th>
                        <td>
                            {{ $customerPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.user') }}
                        </th>
                        <td>
                            {{ $customerPost->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.from') }}
                        </th>
                        <td>
                            {{ $customerPost->from->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.to') }}
                        </th>
                        <td>
                            {{ $customerPost->to->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.from_city') }}
                        </th>
                        <td>
                            {{ $customerPost->from_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.to_city') }}
                        </th>
                        <td>
                            {{ $customerPost->to_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.delivery_type') }}
                        </th>
                        <td>
                            {{ $customerPost->delivery_type->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.vehicle_type') }}
                        </th>
                        <td>
                            {{ $customerPost->vehicle_type->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.load') }}
                        </th>
                        <td>
                            {{ $customerPost->load }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.load_type') }}
                        </th>
                        <td>
                            {{ $customerPost->load_type->name_ru ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.weight') }}
                        </th>
                        <td>
                            {{ $customerPost->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.area') }}
                        </th>
                        <td>
                            {{ $customerPost->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.date') }}
                        </th>
                        <td>
                            {{ $customerPost->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.price') }}
                        </th>
                        <td>
                            {{ $customerPost->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerPost.fields.currency') }}
                        </th>
                        <td>
                            {{ $customerPost->currency->name_ru ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection