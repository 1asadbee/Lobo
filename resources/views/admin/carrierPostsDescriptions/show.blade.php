@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carrierPostsDescription.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carrier-posts-descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPostsDescription.fields.id') }}
                        </th>
                        <td>
                            {{ $carrierPostsDescription->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPostsDescription.fields.carrier_post') }}
                        </th>
                        <td>
                            {{ $carrierPostsDescription->carrier_post->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrierPostsDescription.fields.description') }}
                        </th>
                        <td>
                            {{ $carrierPostsDescription->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carrier-posts-descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection