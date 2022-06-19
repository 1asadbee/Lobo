@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.carrierPost.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carrier-posts.update", [$carrierPost->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.carrierPost.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $carrierPost->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_id">{{ trans('cruds.carrierPost.fields.from') }}</label>
                <select class="form-control select2 {{ $errors->has('from') ? 'is-invalid' : '' }}" name="from_id" id="from_id" required>
                    @foreach($froms as $id => $entry)
                        <option value="{{ $id }}" {{ (old('from_id') ? old('from_id') : $carrierPost->from->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to_id">{{ trans('cruds.carrierPost.fields.to') }}</label>
                <select class="form-control select2 {{ $errors->has('to') ? 'is-invalid' : '' }}" name="to_id" id="to_id" required>
                    @foreach($tos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('to_id') ? old('to_id') : $carrierPost->to->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $carrierPost->status || old('status', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">{{ trans('cruds.carrierPost.fields.status') }}</label>
                </div>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="departure_time">{{ trans('cruds.carrierPost.fields.departure_time') }}</label>
                <input class="form-control datetime {{ $errors->has('departure_time') ? 'is-invalid' : '' }}" type="text" name="departure_time" id="departure_time" value="{{ old('departure_time', $carrierPost->departure_time) }}">
                @if($errors->has('departure_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('departure_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.departure_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="free_weight">{{ trans('cruds.carrierPost.fields.free_weight') }}</label>
                <input class="form-control {{ $errors->has('free_weight') ? 'is-invalid' : '' }}" type="number" name="free_weight" id="free_weight" value="{{ old('free_weight', $carrierPost->free_weight) }}" step="1">
                @if($errors->has('free_weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('free_weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.free_weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="free_area">{{ trans('cruds.carrierPost.fields.free_area') }}</label>
                <input class="form-control {{ $errors->has('free_area') ? 'is-invalid' : '' }}" type="text" name="free_area" id="free_area" value="{{ old('free_area', $carrierPost->free_area) }}">
                @if($errors->has('free_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('free_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.free_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.carrierPost.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $carrierPost->price) }}" step="1">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency_id">{{ trans('cruds.carrierPost.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id" required>
                    @foreach($currencies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('currency_id') ? old('currency_id') : $carrierPost->currency->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrierPost.fields.currency_helper') }}</span>
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