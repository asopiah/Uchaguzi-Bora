@can('answer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.answers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.answer.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.answer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-respondentAnswers">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.question') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.event') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.country') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.county') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.sub_county') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.constituency') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.ward') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.other_place') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.office') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.source') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.url') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.file') }}
                    </th>
                    <th>
                        {{ trans('cruds.answer.fields.respondent') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($answers as $key => $answer)
                    <tr data-entry-id="{{ $answer->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $answer->id ?? '' }}
                        </td>
                        <td>
                            {{ $answer->question->question ?? '' }}
                        </td>
                        <td>
                            {{ $answer->date ?? '' }}
                        </td>
                        <td>
                            {{ $answer->event ?? '' }}
                        </td>
                        <td>
                            {{ $answer->country->name ?? '' }}
                        </td>
                        <td>
                            @foreach($answer->counties as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($answer->sub_counties as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($answer->constituencies as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($answer->wards as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $answer->other_place ?? '' }}
                        </td>
                        <td>
                            @foreach($answer->offices as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($answer->sources as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $answer->url ?? '' }}
                        </td>
                        <td>
                            @foreach($answer->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                        <td>
                            @foreach($answer->file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                        <td>
                            {{ $answer->respondent->name ?? '' }}
                        </td>
                        <td>
                            @can('answer_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.answers.show', $answer->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan

                            @can('answer_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.answers.edit', $answer->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan

                            @can('answer_delete')
                                <form action="{{ route('admin.answers.destroy', $answer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
            @can('answer_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.answers.massDestroy') }}",
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
            let table = $('.datatable-respondentAnswers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
