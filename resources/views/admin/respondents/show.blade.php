@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.respondent.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.respondents.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.respondent.fields.id') }}
                        </th>
                        <td>
                            {{ $respondent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.respondent.fields.name') }}
                        </th>
                        <td>
                            {{ $respondent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.respondent.fields.age') }}
                        </th>
                        <td>
                            {{ $respondent->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.respondent.fields.gander') }}
                        </th>
                        <td>
                            {{ App\Models\Respondent::GANDER_RADIO[$respondent->gander] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.respondent.fields.respondentcategory') }}
                        </th>
                        <td>
                            {{ $respondent->respondentcategory->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.respondents.index') }}">
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
                <a class="nav-link" href="#respondent_answers" role="tab" data-toggle="tab">
                    {{ trans('cruds.answer.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="respondent_answers">
                @includeIf('admin.respondents.relationships.respondentAnswers', ['answers' => $respondent->respondentAnswers])
            </div>
        </div>
    </div>

@endsection
