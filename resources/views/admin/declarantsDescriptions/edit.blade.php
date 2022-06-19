@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.declarantsDescription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.declarants-descriptions.update", [$declarantsDescription->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="declarant_id">{{ trans('cruds.declarantsDescription.fields.declarant') }}</label>
                <select class="form-control select2 {{ $errors->has('declarant') ? 'is-invalid' : '' }}" name="declarant_id" id="declarant_id" required>
                    @foreach($declarants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('declarant_id') ? old('declarant_id') : $declarantsDescription->declarant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('declarant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('declarant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarantsDescription.fields.declarant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.declarantsDescription.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $declarantsDescription->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarantsDescription.fields.description_helper') }}</span>
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