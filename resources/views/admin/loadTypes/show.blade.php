@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.loadType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.load-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.loadType.fields.id') }}
                        </th>
                        <td>
                            {{ $loadType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loadType.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $loadType->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loadType.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $loadType->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loadType.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $loadType->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loadType.fields.name_en') }}
                        </th>
                        <td>
                            {{ $loadType->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.loadType.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $loadType->name_tr }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.load-types.index') }}">
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
            <a class="nav-link" href="#load_type_customer_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.customerPost.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="load_type_customer_posts">
            @includeIf('admin.loadTypes.relationships.loadTypeCustomerPosts', ['customerPosts' => $loadType->loadTypeCustomerPosts])
        </div>
    </div>
</div>

@endsection