@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.currency.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.id') }}
                        </th>
                        <td>
                            {{ $currency->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.name_uz') }}
                        </th>
                        <td>
                            {{ $currency->name_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.name_cy') }}
                        </th>
                        <td>
                            {{ $currency->name_cy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.name_ru') }}
                        </th>
                        <td>
                            {{ $currency->name_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.name_en') }}
                        </th>
                        <td>
                            {{ $currency->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $currency->name_tr }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
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
            <a class="nav-link" href="#currency_customer_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.customerPost.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="currency_customer_posts">
            @includeIf('admin.currencies.relationships.currencyCustomerPosts', ['customerPosts' => $currency->currencyCustomerPosts])
        </div>
    </div>
</div>

@endsection