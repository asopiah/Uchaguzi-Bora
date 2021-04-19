@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.questions.update", [$question->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="question">{{ trans('cruds.question.fields.question') }}</label>
                    <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text" name="question" id="question" value="{{ old('question', $question->question) }}" required>
                    @if($errors->has('question'))
                        <div class="invalid-feedback">
                            {{ $errors->first('question') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="resources">{{ trans('cruds.question.fields.resource') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('resources') ? 'is-invalid' : '' }}" name="resources[]" id="resources" multiple required>
                        @foreach($resources as $id => $resource)
                            <option value="{{ $id }}" {{ (in_array($id, old('resources', [])) || $question->resources->contains($id)) ? 'selected' : '' }}>{{ $resource }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('resources'))
                        <div class="invalid-feedback">
                            {{ $errors->first('resources') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.question.fields.resource_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.question.fields.status') }}</label>
                    @foreach(App\Models\Question::STATUS_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $question->status) === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.question.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
