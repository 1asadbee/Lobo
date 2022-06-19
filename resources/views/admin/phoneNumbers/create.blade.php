@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.phoneNumber.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.phone-numbers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.phoneNumber.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.phoneNumber.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.phoneNumber.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.phoneNumber.fields.phone_number_helper') }}</span>
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