<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use App\Models\County;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConstituencyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('constituency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituencies = Constituency::with(['county'])->get();

        $counties = County::get();

        return view('admin.constituencies.index', compact('constituencies', 'counties'));
    }

    public function create()
    {
        abort_if(Gate::denies('constituency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.constituencies.create', compact('counties'));
    }

    public function store(Request $request)
    {
        $constituency = Constituency::create($request->all());

        return redirect()->route('admin.constituencies.index');
    }

    public function edit(Constituency $constituency)
    {
        abort_if(Gate::denies('constituency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counties = County::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constituency->load('county');

        return view('admin.constituencies.edit', compact('counties', 'constituency'));
    }

    public function update(Request $request, Constituency $constituency)
    {
        $constituency->update($request->all());

        return redirect()->route('admin.constituencies.index');
    }

    public function show(Constituency $constituency)
    {
        abort_if(Gate::denies('constituency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituency->load('county', 'constituencyWards', 'constituencyAnswers');

        return view('admin.constituencies.show', compact('constituency'));
    }

    public function destroy(Constituency $constituency)
    {
        abort_if(Gate::denies('constituency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituency->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Constituency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
