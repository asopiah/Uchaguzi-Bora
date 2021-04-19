@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.ward.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.wards.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ward.fields.id') }}
                        </th>
                        <td>
                            {{ $ward->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ward.fields.name') }}
                        </th>
                        <td>
                            {{ $ward->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ward.fields.county') }}
                        </th>
                        <td>
                            {{ $ward->county->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ward.fields.constituency') }}
                        </th>
                        <td>
                            {{ $ward->constituency->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.wards.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#ward_answers" role="tab" data-toggle="tab">
                    {{ trans('cruds.answer.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="ward_answers">
                @includeIf('admin.wards.relationships.wardAnswers', ['answers' => $ward->wardAnswers])
            </div>
        </div>
    </div>

@endsection
