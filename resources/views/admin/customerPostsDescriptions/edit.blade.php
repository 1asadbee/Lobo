@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customerPostsDescription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-posts-descriptions.update", [$customerPostsDescription->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="customer_post_id">{{ trans('cruds.customerPostsDescription.fields.customer_post') }}</label>
                <select class="form-control select2 {{ $errors->has('customer_post') ? 'is-invalid' : '' }}" name="customer_post_id" id="customer_post_id" required>
                    @foreach($customer_posts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_post_id') ? old('customer_post_id') : $customerPostsDescription->customer_post->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPostsDescription.fields.customer_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.customerPostsDescription.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $customerPostsDescription->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPostsDescription.fields.description_helper') }}</span>
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