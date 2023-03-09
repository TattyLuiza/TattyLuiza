<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHorarioSemanalRequest;
use App\Http\Requests\StoreHorarioSemanalRequest;
use App\Http\Requests\UpdateHorarioSemanalRequest;
use App\Models\Ano;
use App\Models\Disciplina;
use App\Models\Horario;
use App\Models\HorarioSemanal;
use App\Models\Professor;
use App\Models\Turma;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HorarioSemanalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('horario_semanal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarioSemanals = HorarioSemanal::with(['ano', 'turma', 'professor', 'horario', 'disciplina'])->get();

        return view('admin.horarioSemanals.index', compact('horarioSemanals'));
    }

    public function create()
    {
        abort_if(Gate::denies('horario_semanal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horarios = Horario::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.horarioSemanals.create', compact('anos', 'disciplinas', 'horarios', 'professors', 'turmas'));
    }

    public function store(StoreHorarioSemanalRequest $request)
    {
        $horarioSemanal = HorarioSemanal::create($request->all());

        return redirect()->route('admin.horario-semanals.index');
    }

    public function edit(HorarioSemanal $horarioSemanal)
    {
        abort_if(Gate::denies('horario_semanal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horarios = Horario::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horarioSemanal->load('ano', 'turma', 'professor', 'horario', 'disciplina');

        return view('admin.horarioSemanals.edit', compact('anos', 'disciplinas', 'horarioSemanal', 'horarios', 'professors', 'turmas'));
    }

    public function update(UpdateHorarioSemanalRequest $request, HorarioSemanal $horarioSemanal)
    {
        $horarioSemanal->update($request->all());

        return redirect()->route('admin.horario-semanals.index');
    }

    public function show(HorarioSemanal $horarioSemanal)
    {
        abort_if(Gate::denies('horario_semanal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarioSemanal->load('ano', 'turma', 'professor', 'horario', 'disciplina');

        return view('admin.horarioSemanals.show', compact('horarioSemanal'));
    }

    public function destroy(HorarioSemanal $horarioSemanal)
    {
        abort_if(Gate::denies('horario_semanal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarioSemanal->delete();

        return back();
    }

    public function massDestroy(MassDestroyHorarioSemanalRequest $request)
    {
        $horarioSemanals = HorarioSemanal::find(request('ids'));

        foreach ($horarioSemanals as $horarioSemanal) {
            $horarioSemanal->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
