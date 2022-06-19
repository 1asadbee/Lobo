@can('customer_post_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.customer-posts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.customerPost.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.customerPost.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userCustomerPosts">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.from') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.to') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.from_city') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.to_city') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.delivery_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.vehicle_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.load') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.load_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.area') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerPost.fields.currency') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customerPosts as $key => $customerPost)
                        <tr data-entry-id="{{ $customerPost->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $customerPost->id ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->from->name_ru ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->to->name_ru ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->from_city ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->to_city ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->delivery_type->name_ru ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->vehicle_type->name_ru ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->load ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->load_type->name_ru ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->weight ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->area ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->date ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->price ?? '' }}
                            </td>
                            <td>
                                {{ $customerPost->currency->name_ru ?? '' }}
                            </td>
                            <td>
                                @can('customer_post_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.customer-posts.show', $customerPost->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('customer_post_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.customer-posts.edit', $customerPost->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('customer_post_delete')
                                    <form action="{{ route('admin.customer-posts.destroy', $customerPost->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('customer_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.customer-posts.massDestroy') }}",
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
  let table = $('.datatable-userCustomerPosts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection