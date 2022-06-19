@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vehicle.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicles.update", [$vehicle->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="delivery_type_id">{{ trans('cruds.vehicle.fields.delivery_type') }}</label>
                <select class="form-control select2 {{ $errors->has('delivery_type') ? 'is-invalid' : '' }}" name="delivery_type_id" id="delivery_type_id" required>
                    @foreach($delivery_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('delivery_type_id') ? old('delivery_type_id') : $vehicle->delivery_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('delivery_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.delivery_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_uz">{{ trans('cruds.vehicle.fields.name_uz') }}</label>
                <input class="form-control {{ $errors->has('name_uz') ? 'is-invalid' : '' }}" type="text" name="name_uz" id="name_uz" value="{{ old('name_uz', $vehicle->name_uz) }}" required>
                @if($errors->has('name_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.name_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_cy">{{ trans('cruds.vehicle.fields.name_cy') }}</label>
                <input class="form-control {{ $errors->has('name_cy') ? 'is-invalid' : '' }}" type="text" name="name_cy" id="name_cy" value="{{ old('name_cy', $vehicle->name_cy) }}" required>
                @if($errors->has('name_cy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_cy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.name_cy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_ru">{{ trans('cruds.vehicle.fields.name_ru') }}</label>
                <input class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" type="text" name="name_ru" id="name_ru" value="{{ old('name_ru', $vehicle->name_ru) }}" required>
                @if($errors->has('name_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.name_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.vehicle.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $vehicle->name_en) }}" required>
                @if($errors->has('name_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_tr">{{ trans('cruds.vehicle.fields.name_tr') }}</label>
                <input class="form-control {{ $errors->has('name_tr') ? 'is-invalid' : '' }}" type="text" name="name_tr" id="name_tr" value="{{ old('name_tr', $vehicle->name_tr) }}" required>
                @if($errors->has('name_tr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_tr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.name_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.vehicle.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.image_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.vehicles.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vehicle) && $vehicle->image)
      var file = {!! json_encode($vehicle->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection