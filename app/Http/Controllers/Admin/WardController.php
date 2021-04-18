<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\County;
use App\Models\Ward;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ward_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wards = Ward::with(['county', 'constituency'])->get();

        $counties = County::get();

        $constituencies = Constituency::get();

        return view('admin.wards.index', compact('wards', 'counties', 'constituencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('ward_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constituencies = Constituency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.wards.create', compact('counties', 'constituencies'));
    }

    public function store(Request $request)
    {
        $ward = Ward::create($request->all());

        return redirect()->route('admin.wards.index');
    }

    public function edit(Ward $ward)
    {
        abort_if(Gate::denies('ward_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constituencies = Constituency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ward->load('county', 'constituency');

        return view('admin.wards.edit', compact('counties', 'constituencies', 'ward'));
    }

    public function update(Request $request, Ward $ward)
    {
        $ward->update($request->all());

        return redirect()->route('admin.wards.index');
    }

    public function show(Ward $ward)
    {
        abort_if(Gate::denies('ward_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ward->load('county', 'constituency', 'wardAnswers');

        return view('admin.wards.show', compact('ward'));
    }

    public function destroy(Ward $ward)
    {
        abort_if(Gate::denies('ward_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ward->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Ward::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
