@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.answer.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.answers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.id') }}
                        </th>
                        <td>
                            {{ $answer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.question') }}
                        </th>
                        <td>
                            {{ $answer->question->question ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.date') }}
                        </th>
                        <td>
                            {{ $answer->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.event') }}
                        </th>
                        <td>
                            {{ $answer->event }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.country') }}
                        </th>
                        <td>
                            {{ $answer->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.county') }}
                        </th>
                        <td>
                            @foreach($answer->counties as $key => $county)
                                <span class="label label-info">{{ $county->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.sub_county') }}
                        </th>
                        <td>
                            @foreach($answer->sub_counties as $key => $sub_county)
                                <span class="label label-info">{{ $sub_county->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.constituency') }}
                        </th>
                        <td>
                            @foreach($answer->constituencies as $key => $constituency)
                                <span class="label label-info">{{ $constituency->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.ward') }}
                        </th>
                        <td>
                            @foreach($answer->wards as $key => $ward)
                                <span class="label label-info">{{ $ward->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.other_place') }}
                        </th>
                        <td>
                            {{ $answer->other_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.office') }}
                        </th>
                        <td>
                            @foreach($answer->offices as $key => $office)
                                <span class="label label-info">{{ $office->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.source') }}
                        </th>
                        <td>
                            @foreach($answer->sources as $key => $source)
                                <span class="label label-info">{{ $source->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.url') }}
                        </th>
                        <td>
                            {{ $answer->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.photo') }}
                        </th>
                        <td>
                            @foreach($answer->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.file') }}
                        </th>
                        <td>
                            @foreach($answer->file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.answer.fields.respondent') }}
                        </th>
                        <td>
                            {{ $answer->respondent->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.answers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
