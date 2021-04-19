<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Respondent;
use App\Models\RespondentCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RespondentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('respondent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondents = Respondent::with(['respondentcategory'])->get();

        $respondent_categories = RespondentCategory::get();

        return view('admin.respondents.index', compact('respondents', 'respondent_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('respondent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondentcategories = RespondentCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.respondents.create', compact('respondentcategories'));
    }

    public function store(Request $request)
    {
        $respondent = Respondent::create($request->all());

        return redirect()->route('admin.respondents.index');
    }

    public function edit(Respondent $respondent)
    {
        abort_if(Gate::denies('respondent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondentcategories = RespondentCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $respondent->load('respondentcategory');

        return view('admin.respondents.edit', compact('respondentcategories', 'respondent'));
    }

    public function update(Request $request, Respondent $respondent)
    {
        $respondent->update($request->all());

        return redirect()->route('admin.respondents.index');
    }

    public function show(Respondent $respondent)
    {
        abort_if(Gate::denies('respondent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondent->load('respondentcategory');

        return view('admin.respondents.show', compact('respondent'));
    }

    public function destroy(Respondent $respondent)
    {
        abort_if(Gate::denies('respondent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondent->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Respondent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
