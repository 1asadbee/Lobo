@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customerPost.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-posts.update", [$customerPost->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.customerPost.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $customerPost->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_id">{{ trans('cruds.customerPost.fields.from') }}</label>
                <select class="form-control select2 {{ $errors->has('from') ? 'is-invalid' : '' }}" name="from_id" id="from_id" required>
                    @foreach($froms as $id => $entry)
                        <option value="{{ $id }}" {{ (old('from_id') ? old('from_id') : $customerPost->from->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to_id">{{ trans('cruds.customerPost.fields.to') }}</label>
                <select class="form-control select2 {{ $errors->has('to') ? 'is-invalid' : '' }}" name="to_id" id="to_id" required>
                    @foreach($tos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('to_id') ? old('to_id') : $customerPost->to->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="from_city">{{ trans('cruds.customerPost.fields.from_city') }}</label>
                <input class="form-control {{ $errors->has('from_city') ? 'is-invalid' : '' }}" type="text" name="from_city" id="from_city" value="{{ old('from_city', $customerPost->from_city) }}" required>
                @if($errors->has('from_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.from_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="to_city">{{ trans('cruds.customerPost.fields.to_city') }}</label>
                <input class="form-control {{ $errors->has('to_city') ? 'is-invalid' : '' }}" type="text" name="to_city" id="to_city" value="{{ old('to_city', $customerPost->to_city) }}" required>
                @if($errors->has('to_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.to_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery_type_id">{{ trans('cruds.customerPost.fields.delivery_type') }}</label>
                <select class="form-control select2 {{ $errors->has('delivery_type') ? 'is-invalid' : '' }}" name="delivery_type_id" id="delivery_type_id" required>
                    @foreach($delivery_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('delivery_type_id') ? old('delivery_type_id') : $customerPost->delivery_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('delivery_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.delivery_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vehicle_type_id">{{ trans('cruds.customerPost.fields.vehicle_type') }}</label>
                <select class="form-control select2 {{ $errors->has('vehicle_type') ? 'is-invalid' : '' }}" name="vehicle_type_id" id="vehicle_type_id" required>
                    @foreach($vehicle_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('vehicle_type_id') ? old('vehicle_type_id') : $customerPost->vehicle_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vehicle_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.vehicle_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="load">{{ trans('cruds.customerPost.fields.load') }}</label>
                <input class="form-control {{ $errors->has('load') ? 'is-invalid' : '' }}" type="text" name="load" id="load" value="{{ old('load', $customerPost->load) }}" required>
                @if($errors->has('load'))
                    <div class="invalid-feedback">
                        {{ $errors->first('load') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.load_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="load_type_id">{{ trans('cruds.customerPost.fields.load_type') }}</label>
                <select class="form-control select2 {{ $errors->has('load_type') ? 'is-invalid' : '' }}" name="load_type_id" id="load_type_id" required>
                    @foreach($load_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('load_type_id') ? old('load_type_id') : $customerPost->load_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('load_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('load_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.load_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weight">{{ trans('cruds.customerPost.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="number" name="weight" id="weight" value="{{ old('weight', $customerPost->weight) }}" step="1">
                @if($errors->has('weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area">{{ trans('cruds.customerPost.fields.area') }}</label>
                <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="text" name="area" id="area" value="{{ old('area', $customerPost->area) }}">
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.customerPost.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $customerPost->date) }}">
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.customerPost.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $customerPost->price) }}" step="1" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency_id">{{ trans('cruds.customerPost.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id" required>
                    @foreach($currencies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('currency_id') ? old('currency_id') : $customerPost->currency->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerPost.fields.currency_helper') }}</span>
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