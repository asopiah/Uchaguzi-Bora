<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\SubCounty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCountyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sub_county_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounties = SubCounty::with(['county'])->get();

        $counties = County::get();

        return view('admin.subCounties.index', compact('subCounties', 'counties'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_county_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subCounties.create', compact('counties'));
    }

    public function store(Request $request)
    {
        $subCounty = SubCounty::create($request->all());

        return redirect()->route('admin.sub-counties.index');
    }

    public function edit(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCounty->load('county');

        return view('admin.subCounties.edit', compact('counties', 'subCounty'));
    }

    public function update(Request $request, SubCounty $subCounty)
    {
        $subCounty->update($request->all());

        return redirect()->route('admin.sub-counties.index');
    }

    public function show(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounty->load('county', 'subCountyAnswers');

        return view('admin.subCounties.show', compact('subCounty'));
    }

    public function destroy(SubCounty $subCounty)
    {
        abort_if(Gate::denies('sub_county_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCounty->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        SubCounty::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
