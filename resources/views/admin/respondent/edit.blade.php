@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.respondent.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.respondents.update", [$respondent->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">{{ trans('cruds.respondent.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $respondent->name) }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.respondent.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="age">{{ trans('cruds.respondent.fields.age') }}</label>
                    <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', $respondent->age) }}" step="1">
                    @if($errors->has('age'))
                        <div class="invalid-feedback">
                            {{ $errors->first('age') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.respondent.fields.age_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.respondent.fields.gander') }}</label>
                    @foreach(App\Models\Respondent::GANDER_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('gander') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="gander_{{ $key }}" name="gander" value="{{ $key }}" {{ old('gander', $respondent->gander) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="gander_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('gander'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gander') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.respondent.fields.gander_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="respondentcategory_id">{{ trans('cruds.respondent.fields.respondentcategory') }}</label>
                    <select class="form-control select2 {{ $errors->has('respondentcategory') ? 'is-invalid' : '' }}" name="respondentcategory_id" id="respondentcategory_id">
                        @foreach($respondentcategories as $id => $respondentcategory)
                            <option value="{{ $id }}" {{ (old('respondentcategory_id') ? old('respondentcategory_id') : $respondent->respondentcategory->id ?? '') == $id ? 'selected' : '' }}>{{ $respondentcategory }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('respondentcategory'))
                        <div class="invalid-feedback">
                            {{ $errors->first('respondentcategory') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.respondent.fields.respondentcategory_helper') }}</span>
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
