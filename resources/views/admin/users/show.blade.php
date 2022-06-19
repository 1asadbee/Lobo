@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.company_name') }}
                        </th>
                        <td>
                            {{ $user->company_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#user_phone_numbers" role="tab" data-toggle="tab">
                {{ trans('cruds.phoneNumber.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_carriers" role="tab" data-toggle="tab">
                {{ trans('cruds.carrier.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_carrier_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.carrierPost.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_customer_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.customerPost.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_declarants" role="tab" data-toggle="tab">
                {{ trans('cruds.declarant.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_phone_numbers">
            @includeIf('admin.users.relationships.userPhoneNumbers', ['phoneNumbers' => $user->userPhoneNumbers])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_carriers">
            @includeIf('admin.users.relationships.userCarriers', ['carriers' => $user->userCarriers])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_carrier_posts">
            @includeIf('admin.users.relationships.userCarrierPosts', ['carrierPosts' => $user->userCarrierPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_customer_posts">
            @includeIf('admin.users.relationships.userCustomerPosts', ['customerPosts' => $user->userCustomerPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_declarants">
            @includeIf('admin.users.relationships.userDeclarants', ['declarants' => $user->userDeclarants])
        </div>
    </div>
</div>

@endsection