<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMatriculaRequest;
use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Models\Aluno;
use App\Models\Ano;
use App\Models\Matricula;
use App\Models\Responsavei;
use App\Models\Turma;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatriculaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('matricula_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matriculas = Matricula::with(['ano', 'aluno', 'mae', 'pai', 'turma'])->get();

        return view('admin.matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        abort_if(Gate::denies('matricula_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alunos = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $maes = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pais = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.matriculas.create', compact('alunos', 'anos', 'maes', 'pais', 'turmas'));
    }

    public function store(StoreMatriculaRequest $request)
    {
        $matricula = Matricula::create($request->all());

        return redirect()->route('admin.matriculas.index');
    }

    public function edit(Matricula $matricula)
    {
        abort_if(Gate::denies('matricula_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alunos = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $maes = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pais = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matricula->load('ano', 'aluno', 'mae', 'pai', 'turma');

        return view('admin.matriculas.edit', compact('alunos', 'anos', 'maes', 'matricula', 'pais', 'turmas'));
    }

    public function update(UpdateMatriculaRequest $request, Matricula $matricula)
    {
        $matricula->update($request->all());

        return redirect()->route('admin.matriculas.index');
    }

    public function show(Matricula $matricula)
    {
        abort_if(Gate::denies('matricula_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matricula->load('ano', 'aluno', 'mae', 'pai', 'turma', 'matriculaDiariosAlunos');

        return view('admin.matriculas.show', compact('matricula'));
    }

    public function destroy(Matricula $matricula)
    {
        abort_if(Gate::denies('matricula_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matricula->delete();

        return back();
    }

    public function massDestroy(MassDestroyMatriculaRequest $request)
    {
        $matriculas = Matricula::find(request('ids'));

        foreach ($matriculas as $matricula) {
            $matricula->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
