<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Answer;
use App\Models\Constituency;
use App\Models\Country;
use App\Models\County;
use App\Models\Office;
use App\Models\Question;
use App\Models\Resource;
use App\Models\Respondent;
use App\Models\RespondentCategory;
use App\Models\Source;
use App\Models\SubCounty;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ReportController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        return view('front.home');
    }

    public function create()
    {
        //abort_if(Gate::denies('answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $counties = County::all()->pluck('name', 'id');

        $sub_counties = SubCounty::all()->pluck('name', 'id');

        $constituencies = Constituency::all()->pluck('name', 'id');

        $wards = Ward::all()->pluck('name', 'id');

        $offices = Office::all()->pluck('name', 'id');

        $sources = Source::all()->pluck('name', 'id');

        $respondents = Respondent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $respondentcategories = RespondentCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('front.questionier.create', compact('questions', 'countries', 'counties', 'sub_counties','respondentcategories', 'constituencies', 'wards', 'offices', 'sources','respondents'));
    }

    public function store(Request $request)
    {
        //$respondent = Respondent::create($request->all());

        DB::table('respondents')->insert(
            ['name' => $request->name, 'age' => $request->age, 'gander'=>$request->gander]
        );

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
        }

        return redirect()->route('thanks');
    }

    public function thanks(){
        return view('front.questionier.thanks');
    }

    public function show(){
        $answers = Answer::with(['question', 'country', 'counties', 'sub_counties', 'constituencies', 'wards', 'offices', 'sources', 'media'])->orderBy('created_at','DESC')->get();

        $questions = Question::get();

        $countries = Country::get();

        $counties = County::get();

        $sub_counties = SubCounty::get();

        $constituencies = Constituency::get();

        $wards = Ward::get();

        $offices = Office::get();

        $sources = Source::get();
        $resources = Resource::get();
        return view('front.reports', compact('answers','resources'));
        //return compact('answers');
    }
}
