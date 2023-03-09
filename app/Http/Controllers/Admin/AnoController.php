<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnoRequest;
use App\Http\Requests\StoreAnoRequest;
use App\Http\Requests\UpdateAnoRequest;
use App\Models\Ano;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ano_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::all();

        return view('admin.anos.index', compact('anos'));
    }

    public function create()
    {
        abort_if(Gate::denies('ano_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.anos.create');
    }

    public function store(StoreAnoRequest $request)
    {
        $ano = Ano::create($request->all());

        return redirect()->route('admin.anos.index');
    }

    public function edit(Ano $ano)
    {
        abort_if(Gate::denies('ano_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.anos.edit', compact('ano'));
    }

    public function update(UpdateAnoRequest $request, Ano $ano)
    {
        $ano->update($request->all());

        return redirect()->route('admin.anos.index');
    }

    public function show(Ano $ano)
    {
        abort_if(Gate::denies('ano_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ano->load('anoMatriculas');

        return view('admin.anos.show', compact('ano'));
    }

    public function destroy(Ano $ano)
    {
        abort_if(Gate::denies('ano_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ano->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnoRequest $request)
    {
        $anos = Ano::find(request('ids'));

        foreach ($anos as $ano) {
            $ano->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
