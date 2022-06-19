@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.carrier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carriers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.carrier.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.carrier.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vehicle_model_id">{{ trans('cruds.carrier.fields.vehicle_model') }}</label>
                <select class="form-control select2 {{ $errors->has('vehicle_model') ? 'is-invalid' : '' }}" name="vehicle_model_id" id="vehicle_model_id" required>
                    @foreach($vehicle_models as $id => $entry)
                        <option value="{{ $id }}" {{ old('vehicle_model_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vehicle_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.vehicle_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery_type_id">{{ trans('cruds.carrier.fields.delivery_type') }}</label>
                <select class="form-control select2 {{ $errors->has('delivery_type') ? 'is-invalid' : '' }}" name="delivery_type_id" id="delivery_type_id" required>
                    @foreach($delivery_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('delivery_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('delivery_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.delivery_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vehicle_type_id">{{ trans('cruds.carrier.fields.vehicle_type') }}</label>
                <select class="form-control select2 {{ $errors->has('vehicle_type') ? 'is-invalid' : '' }}" name="vehicle_type_id" id="vehicle_type_id" required>
                    @foreach($vehicle_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('vehicle_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vehicle_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.vehicle_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vehicle_number">{{ trans('cruds.carrier.fields.vehicle_number') }}</label>
                <input class="form-control {{ $errors->has('vehicle_number') ? 'is-invalid' : '' }}" type="text" name="vehicle_number" id="vehicle_number" value="{{ old('vehicle_number', '') }}" required>
                @if($errors->has('vehicle_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.vehicle_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="trailer_size_id">{{ trans('cruds.carrier.fields.trailer_size') }}</label>
                <select class="form-control select2 {{ $errors->has('trailer_size') ? 'is-invalid' : '' }}" name="trailer_size_id" id="trailer_size_id" required>
                    @foreach($trailer_sizes as $id => $entry)
                        <option value="{{ $id }}" {{ old('trailer_size_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('trailer_size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trailer_size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.trailer_size_helper') }}</span>
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