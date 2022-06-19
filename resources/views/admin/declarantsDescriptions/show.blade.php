@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.declarantsDescription.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.declarants-descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.declarantsDescription.fields.id') }}
                        </th>
                        <td>
                            {{ $declarantsDescription->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarantsDescription.fields.declarant') }}
                        </th>
                        <td>
                            {{ $declarantsDescription->declarant->declaration ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.declarantsDescription.fields.description') }}
                        </th>
                        <td>
                            {{ $declarantsDescription->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.declarants-descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection