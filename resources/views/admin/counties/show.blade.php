@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.county.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.counties.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.county.fields.id') }}
                        </th>
                        <td>
                            {{ $county->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.county.fields.name') }}
                        </th>
                        <td>
                            {{ $county->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.county.fields.county_code') }}
                        </th>
                        <td>
                            {{ $county->county_code }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.counties.index') }}">
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
                <a class="nav-link" href="#county_constituencies" role="tab" data-toggle="tab">
                    {{ trans('cruds.constituency.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#county_wards" role="tab" data-toggle="tab">
                    {{ trans('cruds.ward.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#county_sub_counties" role="tab" data-toggle="tab">
                    {{ trans('cruds.subCounty.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#county_answers" role="tab" data-toggle="tab">
                    {{ trans('cruds.answer.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="county_constituencies">
                @includeIf('admin.counties.relationships.countyConstituencies', ['constituencies' => $county->countyConstituencies])
            </div>
            <div class="tab-pane" role="tabpanel" id="county_wards">
                @includeIf('admin.counties.relationships.countyWards', ['wards' => $county->countyWards])
            </div>
            <div class="tab-pane" role="tabpanel" id="county_sub_counties">
                @includeIf('admin.counties.relationships.countySubCounties', ['subCounties' => $county->countySubCounties])
            </div>
            <div class="tab-pane" role="tabpanel" id="county_answers">
                @includeIf('admin.counties.relationships.countyAnswers', ['answers' => $county->countyAnswers])
            </div>
        </div>
    </div>

@endsection
