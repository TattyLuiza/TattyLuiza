<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTurmaprofessordisciplinaRequest;
use App\Http\Requests\StoreTurmaprofessordisciplinaRequest;
use App\Http\Requests\UpdateTurmaprofessordisciplinaRequest;
use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\Turma;
use App\Models\Turmaprofessordisciplina;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TurmaprofessordisciplinaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('turmaprofessordisciplina_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turmaprofessordisciplinas = Turmaprofessordisciplina::with(['turma', 'professor', 'disciplina'])->get();

        return view('admin.turmaprofessordisciplinas.index', compact('turmaprofessordisciplinas'));
    }

    public function create()
    {
        abort_if(Gate::denies('turmaprofessordisciplina_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.turmaprofessordisciplinas.create', compact('disciplinas', 'professors', 'turmas'));
    }

    public function store(StoreTurmaprofessordisciplinaRequest $request)
    {
        $turmaprofessordisciplina = Turmaprofessordisciplina::create($request->all());

        return redirect()->route('admin.turmaprofessordisciplinas.index');
    }

    public function edit(Turmaprofessordisciplina $turmaprofessordisciplina)
    {
        abort_if(Gate::denies('turmaprofessordisciplina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmaprofessordisciplina->load('turma', 'professor', 'disciplina');

        return view('admin.turmaprofessordisciplinas.edit', compact('disciplinas', 'professors', 'turmaprofessordisciplina', 'turmas'));
    }

    public function update(UpdateTurmaprofessordisciplinaRequest $request, Turmaprofessordisciplina $turmaprofessordisciplina)
    {
        $turmaprofessordisciplina->update($request->all());

        return redirect()->route('admin.turmaprofessordisciplinas.index');
    }

    public function show(Turmaprofessordisciplina $turmaprofessordisciplina)
    {
        abort_if(Gate::denies('turmaprofessordisciplina_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turmaprofessordisciplina->load('turma', 'professor', 'disciplina');

        return view('admin.turmaprofessordisciplinas.show', compact('turmaprofessordisciplina'));
    }

    public function destroy(Turmaprofessordisciplina $turmaprofessordisciplina)
    {
        abort_if(Gate::denies('turmaprofessordisciplina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turmaprofessordisciplina->delete();

        return back();
    }

    public function massDestroy(MassDestroyTurmaprofessordisciplinaRequest $request)
    {
        $turmaprofessordisciplinas = Turmaprofessordisciplina::find(request('ids'));

        foreach ($turmaprofessordisciplinas as $turmaprofessordisciplina) {
            $turmaprofessordisciplina->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
