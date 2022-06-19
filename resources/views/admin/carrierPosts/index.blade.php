@extends('layouts.admin')
@section('content')
@can('carrier_post_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.carrier-posts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.carrierPost.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.carrierPost.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CarrierPost">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.to') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.departure_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.free_weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.free_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.carrierPost.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.currency.fields.name_en') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrierPosts as $key => $carrierPost)
                        <tr data-entry-id="{{ $carrierPost->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $carrierPost->id ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->from->name_ru ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->to->name_ru ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $carrierPost->status ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $carrierPost->status ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $carrierPost->departure_time ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->free_weight ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->free_area ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->price ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->currency->name_ru ?? '' }}
                            </td>
                            <td>
                                {{ $carrierPost->currency->name_en ?? '' }}
                            </td>
                            <td>
                                @can('carrier_post_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.carrier-posts.show', $carrierPost->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('carrier_post_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.carrier-posts.edit', $carrierPost->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('carrier_post_delete')
                                    <form action="{{ route('admin.carrier-posts.destroy', $carrierPost->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('carrier_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.carrier-posts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CarrierPost:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection