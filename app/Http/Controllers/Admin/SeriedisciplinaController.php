<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeriedisciplinaRequest;
use App\Http\Requests\StoreSeriedisciplinaRequest;
use App\Http\Requests\UpdateSeriedisciplinaRequest;
use App\Models\Disciplina;
use App\Models\Seriedisciplina;
use App\Models\Series;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeriedisciplinaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seriedisciplina_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seriedisciplinas = Seriedisciplina::with(['serie', 'disciplina'])->get();

        return view('admin.seriedisciplinas.index', compact('seriedisciplinas'));
    }

    public function create()
    {
        abort_if(Gate::denies('seriedisciplina_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Series::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.seriedisciplinas.create', compact('disciplinas', 'series'));
    }

    public function store(StoreSeriedisciplinaRequest $request)
    {
        $seriedisciplina = Seriedisciplina::create($request->all());

        return redirect()->route('admin.seriedisciplinas.index');
    }

    public function edit(Seriedisciplina $seriedisciplina)
    {
        abort_if(Gate::denies('seriedisciplina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Series::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seriedisciplina->load('serie', 'disciplina');

        return view('admin.seriedisciplinas.edit', compact('disciplinas', 'seriedisciplina', 'series'));
    }

    public function update(UpdateSeriedisciplinaRequest $request, Seriedisciplina $seriedisciplina)
    {
        $seriedisciplina->update($request->all());

        return redirect()->route('admin.seriedisciplinas.index');
    }

    public function show(Seriedisciplina $seriedisciplina)
    {
        abort_if(Gate::denies('seriedisciplina_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seriedisciplina->load('serie', 'disciplina');

        return view('admin.seriedisciplinas.show', compact('seriedisciplina'));
    }

    public function destroy(Seriedisciplina $seriedisciplina)
    {
        abort_if(Gate::denies('seriedisciplina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seriedisciplina->delete();

        return back();
    }

    public function massDestroy(MassDestroySeriedisciplinaRequest $request)
    {
        $seriedisciplinas = Seriedisciplina::find(request('ids'));

        foreach ($seriedisciplinas as $seriedisciplina) {
            $seriedisciplina->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
