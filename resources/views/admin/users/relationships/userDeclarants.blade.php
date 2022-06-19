@can('declarant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.declarants.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.declarant.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.declarant.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userDeclarants">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.declaration') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.settlement_fee') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.registration_certificate') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.obtaining_license') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.obtaining_permits') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.unusual_cargo') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.insurance') }}
                        </th>
                        <th>
                            {{ trans('cruds.declarant.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($declarants as $key => $declarant)
                        <tr data-entry-id="{{ $declarant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $declarant->id ?? '' }}
                            </td>
                            <td>
                                {{ $declarant->user->name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->declaration ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->declaration ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->settlement_fee ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->settlement_fee ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->registration_certificate ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->registration_certificate ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->obtaining_license ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->obtaining_license ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->obtaining_permits ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->obtaining_permits ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->unusual_cargo ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->unusual_cargo ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->insurance ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->insurance ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $declarant->status ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $declarant->status ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('declarant_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.declarants.show', $declarant->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('declarant_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.declarants.edit', $declarant->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('declarant_delete')
                                    <form action="{{ route('admin.declarants.destroy', $declarant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('declarant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.declarants.massDestroy') }}",
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
  let table = $('.datatable-userDeclarants:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection