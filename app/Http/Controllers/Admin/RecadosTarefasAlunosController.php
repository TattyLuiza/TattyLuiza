<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRecadosTarefasAlunoRequest;
use App\Http\Requests\StoreRecadosTarefasAlunoRequest;
use App\Http\Requests\UpdateRecadosTarefasAlunoRequest;
use App\Models\Aluno;
use App\Models\RecadosTarefasAluno;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RecadosTarefasAlunosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('recados_tarefas_aluno_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadosTarefasAlunos = RecadosTarefasAluno::with(['id_recado_tarefa_professor', 'id_professor', 'id_alunos'])->get();

        return view('admin.recadosTarefasAlunos.index', compact('recadosTarefasAlunos'));
    }

    public function create()
    {
        abort_if(Gate::denies('recados_tarefas_aluno_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_recado_tarefa_professors = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_professors = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_alunos = Aluno::pluck('nome', 'id');

        return view('admin.recadosTarefasAlunos.create', compact('id_alunos', 'id_professors', 'id_recado_tarefa_professors'));
    }

    public function store(StoreRecadosTarefasAlunoRequest $request)
    {
        $recadosTarefasAluno = RecadosTarefasAluno::create($request->all());
        $recadosTarefasAluno->id_alunos()->sync($request->input('id_alunos', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $recadosTarefasAluno->id]);
        }

        return redirect()->route('admin.recados-tarefas-alunos.index');
    }

    public function edit(RecadosTarefasAluno $recadosTarefasAluno)
    {
        abort_if(Gate::denies('recados_tarefas_aluno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_recado_tarefa_professors = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_professors = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_alunos = Aluno::pluck('nome', 'id');

        $recadosTarefasAluno->load('id_recado_tarefa_professor', 'id_professor', 'id_alunos');

        return view('admin.recadosTarefasAlunos.edit', compact('id_alunos', 'id_professors', 'id_recado_tarefa_professors', 'recadosTarefasAluno'));
    }

    public function update(UpdateRecadosTarefasAlunoRequest $request, RecadosTarefasAluno $recadosTarefasAluno)
    {
        $recadosTarefasAluno->update($request->all());
        $recadosTarefasAluno->id_alunos()->sync($request->input('id_alunos', []));

        return redirect()->route('admin.recados-tarefas-alunos.index');
    }

    public function show(RecadosTarefasAluno $recadosTarefasAluno)
    {
        abort_if(Gate::denies('recados_tarefas_aluno_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadosTarefasAluno->load('id_recado_tarefa_professor', 'id_professor', 'id_alunos');

        return view('admin.recadosTarefasAlunos.show', compact('recadosTarefasAluno'));
    }

    public function destroy(RecadosTarefasAluno $recadosTarefasAluno)
    {
        abort_if(Gate::denies('recados_tarefas_aluno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadosTarefasAluno->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecadosTarefasAlunoRequest $request)
    {
        $recadosTarefasAlunos = RecadosTarefasAluno::find(request('ids'));

        foreach ($recadosTarefasAlunos as $recadosTarefasAluno) {
            $recadosTarefasAluno->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('recados_tarefas_aluno_create') && Gate::denies('recados_tarefas_aluno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RecadosTarefasAluno();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
