@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.declarant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.declarants.update", [$declarant->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.declarant.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $declarant->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('declaration') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="declaration" id="declaration" value="1" {{ $declarant->declaration || old('declaration', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="declaration">{{ trans('cruds.declarant.fields.declaration') }}</label>
                </div>
                @if($errors->has('declaration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('declaration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.declaration_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('settlement_fee') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="settlement_fee" id="settlement_fee" value="1" {{ $declarant->settlement_fee || old('settlement_fee', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="settlement_fee">{{ trans('cruds.declarant.fields.settlement_fee') }}</label>
                </div>
                @if($errors->has('settlement_fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('settlement_fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.settlement_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('registration_certificate') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="registration_certificate" id="registration_certificate" value="1" {{ $declarant->registration_certificate || old('registration_certificate', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="registration_certificate">{{ trans('cruds.declarant.fields.registration_certificate') }}</label>
                </div>
                @if($errors->has('registration_certificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registration_certificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.registration_certificate_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('obtaining_license') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="obtaining_license" id="obtaining_license" value="1" {{ $declarant->obtaining_license || old('obtaining_license', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="obtaining_license">{{ trans('cruds.declarant.fields.obtaining_license') }}</label>
                </div>
                @if($errors->has('obtaining_license'))
                    <div class="invalid-feedback">
                        {{ $errors->first('obtaining_license') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.obtaining_license_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('obtaining_permits') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="obtaining_permits" id="obtaining_permits" value="1" {{ $declarant->obtaining_permits || old('obtaining_permits', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="obtaining_permits">{{ trans('cruds.declarant.fields.obtaining_permits') }}</label>
                </div>
                @if($errors->has('obtaining_permits'))
                    <div class="invalid-feedback">
                        {{ $errors->first('obtaining_permits') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.obtaining_permits_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('unusual_cargo') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="unusual_cargo" id="unusual_cargo" value="1" {{ $declarant->unusual_cargo || old('unusual_cargo', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="unusual_cargo">{{ trans('cruds.declarant.fields.unusual_cargo') }}</label>
                </div>
                @if($errors->has('unusual_cargo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unusual_cargo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.unusual_cargo_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('insurance') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="insurance" id="insurance" value="1" {{ $declarant->insurance || old('insurance', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="insurance">{{ trans('cruds.declarant.fields.insurance') }}</label>
                </div>
                @if($errors->has('insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $declarant->status || old('status', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="status">{{ trans('cruds.declarant.fields.status') }}</label>
                </div>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.declarant.fields.status_helper') }}</span>
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