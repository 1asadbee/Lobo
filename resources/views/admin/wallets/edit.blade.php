@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.wallet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.wallets.update", [$wallet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.wallet.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $wallet->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.wallet.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="coins">{{ trans('cruds.wallet.fields.coins') }}</label>
                <input class="form-control {{ $errors->has('coins') ? 'is-invalid' : '' }}" type="number" name="coins" id="coins" value="{{ old('coins', $wallet->coins) }}" step="1" required>
                @if($errors->has('coins'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coins') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.wallet.fields.coins_helper') }}</span>
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