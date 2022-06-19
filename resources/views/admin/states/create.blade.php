@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.state.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.states.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="country_id">{{ trans('cruds.state.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_uz">{{ trans('cruds.state.fields.name_uz') }}</label>
                <input class="form-control {{ $errors->has('name_uz') ? 'is-invalid' : '' }}" type="text" name="name_uz" id="name_uz" value="{{ old('name_uz', '') }}" required>
                @if($errors->has('name_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.name_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_cy">{{ trans('cruds.state.fields.name_cy') }}</label>
                <input class="form-control {{ $errors->has('name_cy') ? 'is-invalid' : '' }}" type="text" name="name_cy" id="name_cy" value="{{ old('name_cy', '') }}" required>
                @if($errors->has('name_cy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_cy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.name_cy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_ru">{{ trans('cruds.state.fields.name_ru') }}</label>
                <input class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" type="text" name="name_ru" id="name_ru" value="{{ old('name_ru', '') }}" required>
                @if($errors->has('name_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.name_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.state.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', '') }}" required>
                @if($errors->has('name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_tr">{{ trans('cruds.state.fields.name_tr') }}</label>
                <input class="form-control {{ $errors->has('name_tr') ? 'is-invalid' : '' }}" type="text" name="name_tr" id="name_tr" value="{{ old('name_tr', '') }}" required>
                @if($errors->has('name_tr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_tr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.name_tr_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="latitude">Latitude</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="number" name="latitude" id="latitude" value="{{ old('latitude', '') }}" required>
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="latitude">Longitude</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="number" name="longitude" id="longitude" value="{{ old('longitude', '') }}" required>
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
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