@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.ward.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.wards.update", [$ward->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.ward.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $ward->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.ward.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="county_id">{{ trans('cruds.ward.fields.county') }}</label>
                    <select class="form-control select2 {{ $errors->has('county') ? 'is-invalid' : '' }}" name="county_id" id="county_id" required>
                        @foreach($counties as $id => $county)
                            <option value="{{ $id }}" {{ (old('county_id') ? old('county_id') : $ward->county->id ?? '') == $id ? 'selected' : '' }}>{{ $county }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('county'))
                        <div class="invalid-feedback">
                            {{ $errors->first('county') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.ward.fields.county_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="constituency_id">{{ trans('cruds.ward.fields.constituency') }}</label>
                    <select class="form-control select2 {{ $errors->has('constituency') ? 'is-invalid' : '' }}" name="constituency_id" id="constituency_id" required>
                        @foreach($constituencies as $id => $constituency)
                            <option value="{{ $id }}" {{ (old('constituency_id') ? old('constituency_id') : $ward->constituency->id ?? '') == $id ? 'selected' : '' }}>{{ $constituency }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('constituency'))
                        <div class="invalid-feedback">
                            {{ $errors->first('constituency') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.ward.fields.constituency_helper') }}</span>
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
