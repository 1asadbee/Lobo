@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.expensesCustomerPost.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.expenses-customer-posts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.expensesCustomerPost.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesCustomerPost.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spent_coins">{{ trans('cruds.expensesCustomerPost.fields.spent_coins') }}</label>
                <input class="form-control {{ $errors->has('spent_coins') ? 'is-invalid' : '' }}" type="number" name="spent_coins" id="spent_coins" value="{{ old('spent_coins', '') }}" step="1" required>
                @if($errors->has('spent_coins'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spent_coins') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesCustomerPost.fields.spent_coins_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="for">{{ trans('cruds.expensesCustomerPost.fields.for') }}</label>
                <input class="form-control {{ $errors->has('for') ? 'is-invalid' : '' }}" type="text" name="for" id="for" value="{{ old('for', '') }}" required>
                @if($errors->has('for'))
                    <div class="invalid-feedback">
                        {{ $errors->first('for') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesCustomerPost.fields.for_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_post_id">{{ trans('cruds.expensesCustomerPost.fields.customer_post') }}</label>
                <select class="form-control select2 {{ $errors->has('customer_post') ? 'is-invalid' : '' }}" name="customer_post_id" id="customer_post_id" required>
                    @foreach($customer_posts as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_post_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesCustomerPost.fields.customer_post_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection