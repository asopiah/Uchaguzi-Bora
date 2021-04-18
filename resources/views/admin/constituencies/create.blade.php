@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.constituency.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.constituencies.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.constituency.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.constituency.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="county_id">{{ trans('cruds.constituency.fields.county') }}</label>
                    <select class="form-control select2 {{ $errors->has('county') ? 'is-invalid' : '' }}" name="county_id" id="county_id" required>
                        @foreach($counties as $id => $county)
                            <option value="{{ $id }}" {{ old('county_id') == $id ? 'selected' : '' }}>{{ $county }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('county'))
                        <div class="invalid-feedback">
                            {{ $errors->first('county') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.constituency.fields.county_helper') }}</span>
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
