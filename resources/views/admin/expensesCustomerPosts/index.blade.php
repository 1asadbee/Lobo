@extends('layouts.admin')
@section('content')
@can('expenses_customer_post_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.expenses-customer-posts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.expensesCustomerPost.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.expensesCustomerPost.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExpensesCustomerPost">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.spent_coins') }}
                        </th>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.for') }}
                        </th>
                        <th>
                            {{ trans('cruds.expensesCustomerPost.fields.customer_post') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expensesCustomerPosts as $key => $expensesCustomerPost)
                        <tr data-entry-id="{{ $expensesCustomerPost->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $expensesCustomerPost->id ?? '' }}
                            </td>
                            <td>
                                {{ $expensesCustomerPost->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $expensesCustomerPost->spent_coins ?? '' }}
                            </td>
                            <td>
                                {{ $expensesCustomerPost->for ?? '' }}
                            </td>
                            <td>
                                {{ $expensesCustomerPost->customer_post->to_city ?? '' }}
                            </td>
                            <td>
                                @can('expenses_customer_post_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.expenses-customer-posts.show', $expensesCustomerPost->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('expenses_customer_post_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.expenses-customer-posts.edit', $expensesCustomerPost->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('expenses_customer_post_delete')
                                    <form action="{{ route('admin.expenses-customer-posts.destroy', $expensesCustomerPost->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('expenses_customer_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.expenses-customer-posts.massDestroy') }}",
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
  let table = $('.datatable-ExpensesCustomerPost:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection