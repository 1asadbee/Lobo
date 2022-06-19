@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.trailerSize.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trailer-sizes.update", [$trailerSize->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.trailerSize.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $trailerSize->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.trailerSize.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="weight">{{ trans('cruds.trailerSize.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="number" name="weight" id="weight" value="{{ old('weight', $trailerSize->weight) }}" step="1" required>
                @if($errors->has('weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.trailerSize.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="height">{{ trans('cruds.trailerSize.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="number" name="height" id="height" value="{{ old('height', $trailerSize->height) }}" step="1" required>
                @if($errors->has('height'))
                    <div class="invalid-feedback">
                        {{ $errors->first('height') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.trailerSize.fields.height_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="width">{{ trans('cruds.trailerSize.fields.width') }}</label>
                <input class="form-control {{ $errors->has('width') ? 'is-invalid' : '' }}" type="number" name="width" id="width" value="{{ old('width', $trailerSize->width) }}" step="1" required>
                @if($errors->has('width'))
                    <div class="invalid-feedback">
                        {{ $errors->first('width') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.trailerSize.fields.width_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="length">{{ trans('cruds.trailerSize.fields.length') }}</label>
                <input class="form-control {{ $errors->has('length') ? 'is-invalid' : '' }}" type="number" name="length" id="length" value="{{ old('length', $trailerSize->length) }}" step="1" required>
                @if($errors->has('length'))
                    <div class="invalid-feedback">
                        {{ $errors->first('length') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.trailerSize.fields.length_helper') }}</span>
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