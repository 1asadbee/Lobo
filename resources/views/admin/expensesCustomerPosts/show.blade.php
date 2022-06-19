@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.expensesCustomerPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expenses-customer-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.id') }}
                        </th>
                        <td>
                            {{ $expensesCustomerPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.user') }}
                        </th>
                        <td>
                            {{ $expensesCustomerPost->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.spent_coins') }}
                        </th>
                        <td>
                            {{ $expensesCustomerPost->spent_coins }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.for') }}
                        </th>
                        <td>
                            {{ $expensesCustomerPost->for }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.customer_post') }}
                        </th>
                        <td>
                            {{ $expensesCustomerPost->customer_post->to_city ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expenses-customer-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection