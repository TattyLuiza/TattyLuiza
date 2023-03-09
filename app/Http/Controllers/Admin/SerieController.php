<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeriesRequest;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Models\Series;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SerieController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('series_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seriess = Series::all();

        return view('admin.seriess.index', compact('seriess'));
    }

    public function create()
    {
        abort_if(Gate::denies('series_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seriess.create');
    }

    public function store(StoreSeriesRequest $request)
    {
        $series = Series::create($request->all());

        return redirect()->route('admin.seriess.index');
    }

    public function edit(Series $series)
    {
        abort_if(Gate::denies('series_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seriess.edit', compact('series'));
    }

    public function update(UpdateSeriesRequest $request, Series $series)
    {
        $series->update($request->all());

        return redirect()->route('admin.seriess.index');
    }

    public function show(Series $series)
    {
        abort_if(Gate::denies('series_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seriess.show', compact('series'));
    }

    public function destroy(Series $series)
    {
        abort_if(Gate::denies('series_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series->delete();

        return back();
    }

    public function massDestroy(MassDestroySeriesRequest $request)
    {
        $seriess = Series::find(request('ids'));

        foreach ($seriess as $series) {
            $series->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
