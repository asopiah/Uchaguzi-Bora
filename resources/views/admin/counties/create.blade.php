@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.county.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.counties.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.county.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.county.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="county_code">{{ trans('cruds.county.fields.county_code') }}</label>
                    <input class="form-control {{ $errors->has('county_code') ? 'is-invalid' : '' }}" type="text" name="county_code" id="county_code" value="{{ old('county_code', '') }}" required>
                    @if($errors->has('county_code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('county_code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.county.fields.county_code_helper') }}</span>
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
