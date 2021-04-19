<div>

    @if(!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                   class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Respondent Details</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                   class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>State Resource Misused</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                   class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
                <p>Place Misused</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button"
                   class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}">4</a>
                <p>Person Involved</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button"
                   class="btn btn-circle {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }}">5</a>
                <p>Source and Evidence</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-6" type="button"
                   class="btn btn-circle {{ $currentStep != 6 ? 'btn-default' : 'btn-primary' }}"
                   disabled="disabled">6</a>
                <p>Review</p>
            </div>
        </div>
    </div>
    <div>
        <form method="POST" action="{{ route("admin.answers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Respondent Detail</h3>

                        <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                                type="button">Next
                        </button>
                    </div>
                </div>
            </div>
            <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3> State Resource Misused</h3>

                        <div class="form-group">
                            <label class="required"
                                   for="question_id">{{ trans('cruds.answer.fields.question') }}</label>
                            <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}"
                                    wire:model="question_id" id="question_id" required>
                                @foreach($questions as $id => $question)
                                    <option
                                        value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $question }}</option>
                                @endforeach
                            </select>
                            {{--@if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif--}}
                            <span class="help-block">{{ trans('cruds.answer.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date">{{ trans('cruds.answer.fields.date') }}</label>
                            <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                                   wire:model="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="event">{{ trans('cruds.answer.fields.event') }}</label>
                            <input class="form-control {{ $errors->has('event') ? 'is-invalid' : '' }}" type="text"
                                   wire:model="event" id="event" value="{{ old('event', '') }}">
                            @if($errors->has('event'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('event') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.event_helper') }}</span>
                        </div>

                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                wire:click="secondStepSubmit">Next
                        </button>
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                                wire:click="back(1)">Back
                        </button>
                    </div>
                </div>
            </div>
            <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3> Place Misused</h3>

                        <div class="form-group">
                            <label for="country_id">{{ trans('cruds.answer.fields.country') }}</label>
                            <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                    wire:model="country_id" id="country_id">
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
                                    wire:model="counties[]" id="counties" multiple>
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
                                    wire:model="sub_counties[]" id="sub_counties" multiple>
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
                            <select
                                class="form-control select2 {{ $errors->has('constituencies') ? 'is-invalid' : '' }}"
                                wire:model="constituencies[]" id="constituencies" multiple>
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
                                    wire:model="wards[]" id="wards" multiple>
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
                            <input class="form-control {{ $errors->has('other_place') ? 'is-invalid' : '' }}"
                                   type="text" wire:model="other_place" id="other_place" value="{{ old('other_place', '') }}"
                                   size="200%">
                            @if($errors->has('other_place'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('other_place') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.other_place_helper') }}</span>
                        </div>


                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                wire:click="thirdStepSubmit">Next
                        </button>
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                                wire:click="back(2)">Back
                        </button>
                    </div>
                </div>
            </div>
            <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3> Person Involved</h3>
                        <div class="form-group">
                            <label for="offices">{{ trans('cruds.answer.fields.office') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all"
                                      style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all"
                                      style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2 {{ $errors->has('offices') ? 'is-invalid' : '' }}"
                                    wire:model="offices[]" id="offices" style="min-width:600%;" multiple>
                                @foreach($offices as $id => $office)
                                    <option
                                        value="{{ $id }}" {{ in_array($id, old('offices', [])) ? 'selected' : '' }} >{{ $office }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('offices'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('offices') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.office_helper') }}</span>
                        </div>

                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                wire:click="fourthStepSubmit">Next
                        </button>
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                                wire:click="back(3)">Back
                        </button>
                    </div>
                </div>
            </div>
            <div class="row setup-content {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Source & Evidence</h3>
                        <div class="form-group">
                            <label for="sources">{{ trans('cruds.answer.fields.source') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all"
                                      style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all"
                                      style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2 {{ $errors->has('sources') ? 'is-invalid' : '' }}"
                                    wire:model="sources[]" id="sources" multiple>
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
                            <label for="url">{{ trans('cruds.answer.fields.url') }}</label>
                            <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text"
                                   wire:model="url" id="url" value="{{ old('url', '') }}" size="200%">
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.answer.fields.photo') }}</label>
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
                            <label for="file">{{ trans('cruds.answer.fields.file') }}</label>
                            <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}"
                                 id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.file_helper') }}</span>
                        </div>

                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                wire:click="fifthStepSubmit">Next
                        </button>
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                                wire:click="back(4)">Back
                        </button>
                    </div>
                </div>
            </div>
            <div class="row setup-content {{ $currentStep != 6 ? 'displayNone' : '' }}" id="step-6">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3>Submit</h3>

                        <table class="table">
                            <tr>
                                <td>Question</td>
                                <td><strong>{{$question_id}}</strong></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><strong>{{ $date }}</strong></td>
                            </tr>
                            <tr>
                                <td>Event</td>
                                <td><strong>{{ $event }}</strong></td>
                            </tr>
                            <tr>
                                <td>url</td>
                                <td><strong>{{ $url }}</strong></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td><strong>{{ $country_id }}</strong></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><strong>{{ $other_place }}</strong></td>
                            </tr>
                        </table>

                        <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                        {{--<button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>--}}
                        <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                                wire:click="back(5)">Back
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

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

