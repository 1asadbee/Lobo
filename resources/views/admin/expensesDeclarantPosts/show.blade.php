@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.expensesDeclarantPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expenses-declarant-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesDeclarantPost.fields.id') }}
                        </th>
                        <td>
                            {{ $expensesDeclarantPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesDeclarantPost.fields.user') }}
                        </th>
                        <td>
                            {{ $expensesDeclarantPost->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesDeclarantPost.fields.spent_coins') }}
                        </th>
                        <td>
                            {{ $expensesDeclarantPost->spent_coins }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesDeclarantPost.fields.for') }}
                        </th>
                        <td>
                            {{ $expensesDeclarantPost->for }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expensesDeclarantPost.fields.declarant_post') }}
                        </th>
                        <td>
                            {{ $expensesDeclarantPost->declarant_post->declaration ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expenses-declarant-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection