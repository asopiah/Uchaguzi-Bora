@extends('layouts.front-end')
@section('content')
    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            width: inherit; /* Or auto */
            padding: 0 10px; /* To give a bit of padding on the left and right */
            border-bottom: none;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="callout callout-info">
                {{--<h7><i class="fas fa-info"></i> Note:</h7>--}}
                <h4><i class="fas fa-info-circle fa-2x" style="color:green"></i>
                <span>
                        <b>Greetings</b>, Thank you for participating in this initiative. The information you provide will be
                        used to hold to account those who
                misuse state resources. Whatever information being shared on this platform is strictly confidential. Thank you.
                    </span>
                </h4>
            </div>
            <p></p>
            <form method="POST" action="{{ route("report.store") }}" enctype="multipart/form-data">
                <span class="text-center"><i><b>NB:</b> Only fields with (<sup style="color: red"><strong>*</strong></sup>) are mandatory. Everything else is optional</i></span>
                @csrf
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Tell us a bit about yourself.</legend>
                    <div class="form-group">
                        <label for="name">What's you name ?</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                               name="name" id="name" value="{{ old('name', '') }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.respondent.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="age">What's is you age ?</label>
                        <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number"
                               name="age" id="age" value="{{ old('age', '') }}" step="1">
                        @if($errors->has('age'))
                            <div class="invalid-feedback">
                                {{ $errors->first('age') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.respondent.fields.age_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label>What's your gender ?</label>
                        @foreach(App\Models\Respondent::GANDER_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('gander') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="gander_{{ $key }}" name="gander"
                                       value="{{ $key }}" {{ old('gander', '') === (string) $key ? 'checked' : '' }}>
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
                        <label
                            for="respondentcategory_id">Who are you ?</label>
                        <select
                            class="form-control select2 {{ $errors->has('respondentcategory') ? 'is-invalid' : '' }}"
                            name="respondentcategory_id" id="respondentcategory_id">
                            @foreach($respondentcategories as $id => $respondentcategory)
                                <option
                                    value="{{ $id }}" {{ old('respondentcategory_id') == $id ? 'selected' : '' }}>{{ $respondentcategory }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('respondentcategory'))
                            <div class="invalid-feedback">
                                {{ $errors->first('respondentcategory') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.respondent.fields.respondentcategory_helper') }}</span>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">State Resource Misuses</legend>
                <div class="form-group">
                    <label class="required" for="question_id">Which State Reource was Misused</label>
                    <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}"
                            name="question_id" id="question_id" required>
                        @foreach($questions as $id => $question)
                            <option
                                value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $question }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('question'))
                        <div class="invalid-feedback">
                            {{ $errors->first('question') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.question_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="date">When did the event took place ?</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                           name="date" id="date" value="{{ old('date') }}">
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="event">What was the nature of the event eg, burial, government function, etc ?</label>
                    <input class="form-control {{ $errors->has('event') ? 'is-invalid' : '' }}" type="text" name="event"
                           id="event" value="{{ old('event', '') }}">
                    @if($errors->has('event'))
                        <div class="invalid-feedback">
                            {{ $errors->first('event') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.event_helper') }}</span>
                </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Where did the event take place ?</legend>
                    <div class="form-group">
                        <label for="country_id">{{ trans('cruds.answer.fields.country') }}</label>
                        <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                name="country_id" id="country_id">
                            @foreach($countries as $id => $country)
                                <option
                                    value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $country }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('country'))
                            <div class="invalid-feedback">
                                {{ $errors->first('country') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.answer.fields.country_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="counties">{{ trans('cruds.answer.fields.county') }}</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                  style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all"
                                  style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div>
                        <select class="form-control select2 {{ $errors->has('counties') ? 'is-invalid' : '' }}"
                                name="counties[]" id="counties" multiple>
                            @foreach($counties as $id => $county)
                                <option
                                    value="{{ $id }}" {{ in_array($id, old('counties', [])) ? 'selected' : '' }}>{{ $county }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('counties'))
                            <div class="invalid-feedback">
                                {{ $errors->first('counties') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.answer.fields.county_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="sub_counties">{{ trans('cruds.answer.fields.sub_county') }}</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                  style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all"
                                  style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div>
                        <select class="form-control select2 {{ $errors->has('sub_counties') ? 'is-invalid' : '' }}"
                                name="sub_counties[]" id="sub_counties" multiple>
                            @foreach($sub_counties as $id => $sub_county)
                                <option
                                    value="{{ $id }}" {{ in_array($id, old('sub_counties', [])) ? 'selected' : '' }}>{{ $sub_county }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('sub_counties'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sub_counties') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.answer.fields.sub_county_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="constituencies">{{ trans('cruds.answer.fields.constituency') }}</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                  style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all"
                                  style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div>
                        <select class="form-control select2 {{ $errors->has('constituencies') ? 'is-invalid' : '' }}"
                                name="constituencies[]" id="constituencies" multiple>
                            @foreach($constituencies as $id => $constituency)
                                <option
                                    value="{{ $id }}" {{ in_array($id, old('constituencies', [])) ? 'selected' : '' }}>{{ $constituency }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('constituencies'))
                            <div class="invalid-feedback">
                                {{ $errors->first('constituencies') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.answer.fields.constituency_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="wards">{{ trans('cruds.answer.fields.ward') }}</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                  style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all"
                                  style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div>
                        <select class="form-control select2 {{ $errors->has('wards') ? 'is-invalid' : '' }}"
                                name="wards[]" id="wards" multiple>
                            @foreach($wards as $id => $ward)
                                <option
                                    value="{{ $id }}" {{ in_array($id, old('wards', [])) ? 'selected' : '' }}>{{ $ward }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('wards'))
                            <div class="invalid-feedback">
                                {{ $errors->first('wards') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.answer.fields.ward_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="other_place">{{ trans('cruds.answer.fields.other_place') }}</label>
                        <input class="form-control {{ $errors->has('other_place') ? 'is-invalid' : '' }}" type="text"
                               name="other_place" id="other_place" value="{{ old('other_place', '') }}">
                        @if($errors->has('other_place'))
                            <div class="invalid-feedback">
                                {{ $errors->first('other_place') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.answer.fields.other_place_helper') }}</span>
                    </div>
                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Person/Office Involved</legend>
                <div class="form-group">
                    <label for="offices">Who was involved ?</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('offices') ? 'is-invalid' : '' }}"
                            name="offices[]" id="offices" multiple>
                        @foreach($offices as $id => $office)
                            <option
                                value="{{ $id }}" {{ in_array($id, old('offices', [])) ? 'selected' : '' }}>{{ $office }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('offices'))
                        <div class="invalid-feedback">
                            {{ $errors->first('offices') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.office_helper') }}</span>
                </div>
                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Information Source</legend>
                <div class="form-group">
                    <label for="sources">How did you come across this information?</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('sources') ? 'is-invalid' : '' }}"
                            name="sources[]" id="sources" multiple>
                        @foreach($sources as $id => $source)
                            <option
                                value="{{ $id }}" {{ in_array($id, old('sources', [])) ? 'selected' : '' }}>{{ $source }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('sources'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sources') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.source_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="url">Any reference link(url) ?</label>
                    <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url"
                           id="url" value="{{ old('url', '') }}">
                    @if($errors->has('url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('url') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.url_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="photo">Upload Photo(s)/Image(s) Evidence</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                         id="photo-dropzone">
                    </div>
                    @if($errors->has('photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.photo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="file">Upload Other File(s) Media Evidence e.g videos, document(like pdf, word, excel) </label>
                    <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                    </div>
                    @if($errors->has('file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.file_helper') }}</span>
                </div>
                </fieldset>
                {{--<div class="form-group">
                    <label class="required" for="respondent_id">{{ trans('cruds.answer.fields.respondent') }}</label>
                    <select class="form-control select2 {{ $errors->has('respondent') ? 'is-invalid' : '' }}" name="respondent_id" id="respondent_id" required>
                        @foreach($respondents as $id => $respondent)
                            <option value="{{ $id }}" {{ old('respondent_id') == $id ? 'selected' : '' }}>{{ $respondent }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('respondent'))
                        <div class="invalid-feedback">
                            {{ $errors->first('respondent') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.answer.fields.respondent_helper') }}</span>
                </div>--}}
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        var uploadedPhotoMap = {}
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.answers.storeMedia') }}',
            maxFilesize: 20, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 20,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
                uploadedPhotoMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPhotoMap[file.name]
                }
                $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($answer) && $answer->photo)
                var files =
                {!! json_encode($answer->photo) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        var uploadedFileMap = {}
        Dropzone.options.fileDropzone = {
            url: '{{ route('admin.answers.storeMedia') }}',
            maxFilesize: 1024, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1024
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="file[]" value="' + response.name + '">')
                uploadedFileMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFileMap[file.name]
                }
                $('form').find('input[name="file[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($answer) && $answer->file)
                var files =
                {!! json_encode($answer->file) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
