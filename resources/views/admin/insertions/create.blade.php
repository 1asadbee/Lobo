@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.insertion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.insertions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.insertion.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.insertion.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="given_money">{{ trans('cruds.insertion.fields.given_money') }}</label>
                <input class="form-control {{ $errors->has('given_money') ? 'is-invalid' : '' }}" type="number" name="given_money" id="given_money" value="{{ old('given_money', '') }}" step="1" required>
                @if($errors->has('given_money'))
                    <div class="invalid-feedback">
                        {{ $errors->first('given_money') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.insertion.fields.given_money_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency_id">{{ trans('cruds.insertion.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id" required>
                    @foreach($currencies as $id => $entry)
                        <option value="{{ $id }}" {{ old('currency_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.insertion.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="taken_coins">{{ trans('cruds.insertion.fields.taken_coins') }}</label>
                <input class="form-control {{ $errors->has('taken_coins') ? 'is-invalid' : '' }}" type="number" name="taken_coins" id="taken_coins" value="{{ old('taken_coins', '') }}" step="1" required>
                @if($errors->has('taken_coins'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taken_coins') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.insertion.fields.taken_coins_helper') }}</span>
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