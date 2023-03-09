<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBoletinRequest;
use App\Http\Requests\StoreBoletinRequest;
use App\Http\Requests\UpdateBoletinRequest;
use App\Models\Aluno;
use App\Models\Boletin;
use App\Models\Disciplina;
use App\Models\Matricula;
use App\Models\Professor;
use App\Models\Turma;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoletinsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('boletin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boletins = Boletin::with(['aluno', 'matricula', 'professor', 'turma', 'disciplina'])->get();

        return view('admin.boletins.index', compact('boletins'));
    }

    public function create()
    {
        abort_if(Gate::denies('boletin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alunos = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matriculas = Matricula::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.boletins.create', compact('alunos', 'disciplinas', 'matriculas', 'professors', 'turmas'));
    }

    public function store(StoreBoletinRequest $request)
    {
        $boletin = Boletin::create($request->all());

        return redirect()->route('admin.boletins.index');
    }

    public function edit(Boletin $boletin)
    {
        abort_if(Gate::denies('boletin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alunos = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matriculas = Matricula::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boletin->load('aluno', 'matricula', 'professor', 'turma', 'disciplina');

        return view('admin.boletins.edit', compact('alunos', 'boletin', 'disciplinas', 'matriculas', 'professors', 'turmas'));
    }

    public function update(UpdateBoletinRequest $request, Boletin $boletin)
    {
        $boletin->update($request->all());

        return redirect()->route('admin.boletins.index');
    }

    public function show(Boletin $boletin)
    {
        abort_if(Gate::denies('boletin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boletin->load('aluno', 'matricula', 'professor', 'turma', 'disciplina');

        return view('admin.boletins.show', compact('boletin'));
    }

    public function destroy(Boletin $boletin)
    {
        abort_if(Gate::denies('boletin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boletin->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoletinRequest $request)
    {
        $boletins = Boletin::find(request('ids'));

        foreach ($boletins as $boletin) {
            $boletin->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
