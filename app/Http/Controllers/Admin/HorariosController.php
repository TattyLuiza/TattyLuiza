<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHorarioRequest;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Models\Ano;
use App\Models\Horario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HorariosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('horario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarios = Horario::with(['ano'])->get();

        return view('admin.horarios.index', compact('horarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('horario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.horarios.create', compact('anos'));
    }

    public function store(StoreHorarioRequest $request)
    {
        $horario = Horario::create($request->all());

        return redirect()->route('admin.horarios.index');
    }

    public function edit(Horario $horario)
    {
        abort_if(Gate::denies('horario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horario->load('ano');

        return view('admin.horarios.edit', compact('anos', 'horario'));
    }

    public function update(UpdateHorarioRequest $request, Horario $horario)
    {
        $horario->update($request->all());

        return redirect()->route('admin.horarios.index');
    }

    public function show(Horario $horario)
    {
        abort_if(Gate::denies('horario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horario->load('ano', 'horarioHorarioSemanals', 'horarioDiarios');

        return view('admin.horarios.show', compact('horario'));
    }

    public function destroy(Horario $horario)
    {
        abort_if(Gate::denies('horario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horario->delete();

        return back();
    }

    public function massDestroy(MassDestroyHorarioRequest $request)
    {
        $horarios = Horario::find(request('ids'));

        foreach ($horarios as $horario) {
            $horario->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
