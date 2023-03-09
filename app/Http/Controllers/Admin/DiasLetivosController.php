<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDiasLetivoRequest;
use App\Http\Requests\StoreDiasLetivoRequest;
use App\Http\Requests\UpdateDiasLetivoRequest;
use App\Models\Ano;
use App\Models\DiasLetivo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiasLetivosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dias_letivo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diasLetivos = DiasLetivo::with(['ano'])->get();

        return view('admin.diasLetivos.index', compact('diasLetivos'));
    }

    public function create()
    {
        abort_if(Gate::denies('dias_letivo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.diasLetivos.create', compact('anos'));
    }

    public function store(StoreDiasLetivoRequest $request)
    {
        $diasLetivo = DiasLetivo::create($request->all());

        return redirect()->route('admin.dias-letivos.index');
    }

    public function edit(DiasLetivo $diasLetivo)
    {
        abort_if(Gate::denies('dias_letivo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diasLetivo->load('ano');

        return view('admin.diasLetivos.edit', compact('anos', 'diasLetivo'));
    }

    public function update(UpdateDiasLetivoRequest $request, DiasLetivo $diasLetivo)
    {
        $diasLetivo->update($request->all());

        return redirect()->route('admin.dias-letivos.index');
    }

    public function show(DiasLetivo $diasLetivo)
    {
        abort_if(Gate::denies('dias_letivo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diasLetivo->load('ano', 'diaLetivoPlanosAulas', 'diaLetivoDiarios');

        return view('admin.diasLetivos.show', compact('diasLetivo'));
    }

    public function destroy(DiasLetivo $diasLetivo)
    {
        abort_if(Gate::denies('dias_letivo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diasLetivo->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiasLetivoRequest $request)
    {
        $diasLetivos = DiasLetivo::find(request('ids'));

        foreach ($diasLetivos as $diasLetivo) {
            $diasLetivo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
