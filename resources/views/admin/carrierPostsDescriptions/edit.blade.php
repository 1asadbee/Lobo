@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.carrierPostsDescription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carrier-posts-descriptions.update", [$carrierPostsDescription->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="carrier_post_id">{{ trans('cruds.carrierPostsDescription.fields.carrier_post') }}</label>
                <select class="form-control select2 {{ $errors->has('carrier_post') ? 'is-invalid' : '' }}" name="carrier_post_id" id="carrier_post_id" required>
                    @foreach($carrier_posts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('carrier_post_id') ? old('carrier_post_id') : $carrierPostsDescription->carrier_post->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('carrier_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('carrier_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPostsDescription.fields.carrier_post_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.carrierPostsDescription.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $carrierPostsDescription->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPostsDescription.fields.description_helper') }}</span>
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