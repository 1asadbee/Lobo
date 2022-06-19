@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.state.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.states.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.id') }}
                        </th>
                        <td>
                            {{ $state->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.country') }}
                        </th>
                        <td>
                            {{ $state->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $state->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $state->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $state->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.name_en') }}
                        </th>
                        <td>
                            {{ $state->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.state.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $state->name_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Latitude
                        </th>
                        <td>
                            {{ $state->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Longitude
                        </th>
                        <td>
                            {{ $state->longitude }}
                        </td>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.states.index') }}">
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
            <a class="nav-link" href="#from_carrier_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.carrierPost.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#to_carrier_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.carrierPost.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#from_customer_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.customerPost.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#to_customer_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.customerPost.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="from_carrier_posts">
            @includeIf('admin.states.relationships.fromCarrierPosts', ['carrierPosts' => $state->fromCarrierPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="to_carrier_posts">
            @includeIf('admin.states.relationships.toCarrierPosts', ['carrierPosts' => $state->toCarrierPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="from_customer_posts">
            @includeIf('admin.states.relationships.fromCustomerPosts', ['customerPosts' => $state->fromCustomerPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="to_customer_posts">
            @includeIf('admin.states.relationships.toCustomerPosts', ['customerPosts' => $state->toCustomerPosts])
        </div>
    </div>
</div>

@endsection