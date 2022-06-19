@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.expensesDeclarantPost.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.expenses-declarant-posts.update", [$expensesDeclarantPost->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.expensesDeclarantPost.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $expensesDeclarantPost->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesDeclarantPost.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spent_coins">{{ trans('cruds.expensesDeclarantPost.fields.spent_coins') }}</label>
                <input class="form-control {{ $errors->has('spent_coins') ? 'is-invalid' : '' }}" type="number" name="spent_coins" id="spent_coins" value="{{ old('spent_coins', $expensesDeclarantPost->spent_coins) }}" step="1" required>
                @if($errors->has('spent_coins'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spent_coins') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesDeclarantPost.fields.spent_coins_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="for">{{ trans('cruds.expensesDeclarantPost.fields.for') }}</label>
                <input class="form-control {{ $errors->has('for') ? 'is-invalid' : '' }}" type="text" name="for" id="for" value="{{ old('for', $expensesDeclarantPost->for) }}" required>
                @if($errors->has('for'))
                    <div class="invalid-feedback">
                        {{ $errors->first('for') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesDeclarantPost.fields.for_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="declarant_post_id">{{ trans('cruds.expensesDeclarantPost.fields.declarant_post') }}</label>
                <select class="form-control select2 {{ $errors->has('declarant_post') ? 'is-invalid' : '' }}" name="declarant_post_id" id="declarant_post_id" required>
                    @foreach($declarant_posts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('declarant_post_id') ? old('declarant_post_id') : $expensesDeclarantPost->declarant_post->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('declarant_post'))
                    <div class="invalid-feedback">
                        {{ $errors->first('declarant_post') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.expensesDeclarantPost.fields.declarant_post_helper') }}</span>
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