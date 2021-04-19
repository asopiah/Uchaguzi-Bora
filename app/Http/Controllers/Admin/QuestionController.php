<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::with(['resources'])->get();

        $resources = Resource::get();

        return view('admin.questions.index', compact('questions', 'resources'));
    }

    public function create()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resources = Resource::all()->pluck('name', 'id');

        return view('admin.questions.create', compact('resources'));
    }

    public function store(Request $request)
    {
        $question = Question::create($request->all());
        $question->resources()->sync($request->input('resources', []));

        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resources = Resource::all()->pluck('name', 'id');

        $question->load('resources');

        return view('admin.questions.edit', compact('resources', 'question'));
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        $question->resources()->sync($request->input('resources', []));

        return redirect()->route('admin.questions.index');
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('resources', 'questionAnswers');

        return view('admin.questions.show', compact('question'));
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
