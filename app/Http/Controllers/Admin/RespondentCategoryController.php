<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRespondentCategoryRequest;
use App\Http\Requests\StoreRespondentCategoryRequest;
use App\Http\Requests\UpdateRespondentCategoryRequest;
use App\Models\RespondentCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RespondentCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('respondent_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondentCategories = RespondentCategory::all();

        return view('admin.respondentCategories.index', compact('respondentCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('respondent_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.respondentCategories.create');
    }

    public function store(StoreRespondentCategoryRequest $request)
    {
        $respondentCategory = RespondentCategory::create($request->all());

        return redirect()->route('admin.respondent-categories.index');
    }

    public function edit(RespondentCategory $respondentCategory)
    {
        abort_if(Gate::denies('respondent_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.respondentCategories.edit', compact('respondentCategory'));
    }

    public function update(UpdateRespondentCategoryRequest $request, RespondentCategory $respondentCategory)
    {
        $respondentCategory->update($request->all());

        return redirect()->route('admin.respondent-categories.index');
    }

    public function show(RespondentCategory $respondentCategory)
    {
        abort_if(Gate::denies('respondent_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondentCategory->load('respondentcategoryRespondents');

        return view('admin.respondentCategories.show', compact('respondentCategory'));
    }

    public function destroy(RespondentCategory $respondentCategory)
    {
        abort_if(Gate::denies('respondent_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $respondentCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyRespondentCategoryRequest $request)
    {
        RespondentCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
