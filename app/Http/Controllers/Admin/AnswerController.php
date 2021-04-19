<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Answer;
use App\Models\Constituency;
use App\Models\Country;
use App\Models\County;
use App\Models\Office;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\RespondentCategory;
use App\Models\Source;
use App\Models\SubCounty;
use App\Models\Ward;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answers = Answer::with(['question', 'country', 'counties', 'sub_counties', 'constituencies', 'wards', 'offices', 'sources', 'media'])->get();

        $questions = Question::get();

        $countries = Country::get();

        $counties = County::get();

        $sub_counties = SubCounty::get();

        $constituencies = Constituency::get();

        $wards = Ward::get();

        $offices = Office::get();

        $sources = Source::get();
        return compact('answers');

        //return view('admin.answers.index', compact('answers', 'questions', 'countries', 'counties', 'sub_counties', 'constituencies', 'wards', 'offices', 'sources'));
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
        $respondent = Respondent::create($request->all());

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

        return redirect()->route('admin.answers.index');
    }

    public function edit(Answer $answer)
    {
        abort_if(Gate::denies('answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $counties = County::all()->pluck('name', 'id');

        $sub_counties = SubCounty::all()->pluck('name', 'id');

        $constituencies = Constituency::all()->pluck('name', 'id');

        $wards = Ward::all()->pluck('name', 'id');

        $offices = Office::all()->pluck('name', 'id');

        $sources = Source::all()->pluck('name', 'id');

        $answer->load('question', 'country', 'counties', 'sub_counties', 'constituencies', 'wards', 'offices', 'sources');

        return view('admin.answers.edit', compact('questions', 'countries', 'counties', 'sub_counties', 'constituencies', 'wards', 'offices', 'sources', 'answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        $answer->update($request->all());
        $answer->counties()->sync($request->input('counties', []));
        $answer->sub_counties()->sync($request->input('sub_counties', []));
        $answer->constituencies()->sync($request->input('constituencies', []));
        $answer->wards()->sync($request->input('wards', []));
        $answer->offices()->sync($request->input('offices', []));
        $answer->sources()->sync($request->input('sources', []));
        if (count($answer->photo) > 0) {
            foreach ($answer->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $answer->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $answer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        if (count($answer->file) > 0) {
            foreach ($answer->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $answer->file->pluck('file_name')->toArray();
        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $answer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
            }
        }

        return redirect()->route('admin.answers.index');
    }

    public function show(Answer $answer)
    {
        abort_if(Gate::denies('answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->load('question', 'country', 'counties', 'sub_counties', 'constituencies', 'wards', 'offices', 'sources');

        return view('admin.answers.show', compact('answer'));
    }

    public function destroy(Answer $answer)
    {
        abort_if(Gate::denies('answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $answer->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Answer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('answer_create') && Gate::denies('answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Answer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
