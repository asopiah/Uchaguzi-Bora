<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Answer;
use App\Models\Constituency;
use App\Models\Country;
use App\Models\County;
use App\Models\Office;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\Source;
use App\Models\SubCounty;
use App\Models\Ward;
use Illuminate\Http\Request;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Wizard extends Component
{
    use MediaUploadingTrait;
    public $currentStep = 1;
    public $question_id, $date, $event, $country_id, $other_place, $url, $counties=[];
    public $successMessage = '';

    /*
     *
     * 'question_id',
        'date',
        'event',
        'country_id',
        'other_place',
        'url',*/

    public function mount()
    {
        $this->questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $this->counties = County::all()->pluck('name', 'id');

        $this->sub_counties = SubCounty::all()->pluck('name', 'id');

        $this->constituencies = Constituency::all()->pluck('name', 'id');

        $this->wards = Ward::all()->pluck('name', 'id');

        $this->offices = Office::all()->pluck('name', 'id');

        $this->sources = Source::all()->pluck('name', 'id');

        $this->respondents = Respondent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');
        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $counties = County::all()->pluck('name', 'id');

        $sub_counties = SubCounty::all()->pluck('name', 'id');

        $constituencies = Constituency::all()->pluck('name', 'id');

        $wards = Ward::all()->pluck('name', 'id');

        $offices = Office::all()->pluck('name', 'id');

        $sources = Source::all()->pluck('name', 'id');

        $respondents = Respondent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //return view('livewire.wizard')->with('questions', $questions, 'countries', $countries);
        //return view('livewire.wizard');
        return view('livewire.wizard', compact('questions', 'countries', 'counties', 'sub_counties', 'constituencies', 'wards', 'offices', 'sources','respondents'));

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {

        $this->currentStep = 3;
    }
    public function thirdStepSubmit()
    {

        $this->currentStep = 4;
    }
    public function fourthStepSubmit()
    {

        $this->currentStep = 5;
    }
    public function fifthStepSubmit()
    {

        $this->currentStep = 6;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm(Request $request)
    {
        Answer::create([
            'question_id' => $this->question_id,
            'date' => $this->date,
            'event' => $this->event,
            'country_id' => $this->country_id,
            'other_place' => $this->other_place,
            'url' => $this->url,
        ]);
        /*dd($request);
        $answer = Answer::create($request->all());
        $answer->counties()->sync($request->input('counties', []));
        $answer->sub_counties()->sync($request->input('sub_counties', []));
        $answer->constituencies()->sync($request->input('constituencies', []));
        $answer->wards()->sync($request->input('wards', []));
        $answer->offices()->sync($request->input('offices', []));
        $answer->sources()->sync($request->input('sources', []));
        foreach ($request->input('photo', []) as $file) {
            $answer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        foreach ($request->input('file', []) as $file) {
            $answer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $answer->id]);
        }*/


        //return redirect()->route('admin.answers.store');

        $this->successMessage = 'Student Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->name = '';
        $this->registration_id = '';
        $this->gender = '';
        $this->mobile = '';
        $this->address = '';
    }
}
