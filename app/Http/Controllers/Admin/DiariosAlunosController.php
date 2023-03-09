<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDiariosAlunoRequest;
use App\Http\Requests\StoreDiariosAlunoRequest;
use App\Http\Requests\UpdateDiariosAlunoRequest;
use App\Models\Diario;
use App\Models\DiariosAluno;
use App\Models\Matricula;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DiariosAlunosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('diarios_aluno_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diariosAlunos = DiariosAluno::with(['diario', 'matricula'])->get();

        return view('admin.diariosAlunos.index', compact('diariosAlunos'));
    }

    public function create()
    {
        abort_if(Gate::denies('diarios_aluno_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diarios = Diario::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matriculas = Matricula::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.diariosAlunos.create', compact('diarios', 'matriculas'));
    }

    public function store(StoreDiariosAlunoRequest $request)
    {
        $diariosAluno = DiariosAluno::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $diariosAluno->id]);
        }

        return redirect()->route('admin.diarios-alunos.index');
    }

    public function edit(DiariosAluno $diariosAluno)
    {
        abort_if(Gate::denies('diarios_aluno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diarios = Diario::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matriculas = Matricula::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diariosAluno->load('diario', 'matricula');

        return view('admin.diariosAlunos.edit', compact('diarios', 'diariosAluno', 'matriculas'));
    }

    public function update(UpdateDiariosAlunoRequest $request, DiariosAluno $diariosAluno)
    {
        $diariosAluno->update($request->all());

        return redirect()->route('admin.diarios-alunos.index');
    }

    public function show(DiariosAluno $diariosAluno)
    {
        abort_if(Gate::denies('diarios_aluno_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diariosAluno->load('diario', 'matricula');

        return view('admin.diariosAlunos.show', compact('diariosAluno'));
    }

    public function destroy(DiariosAluno $diariosAluno)
    {
        abort_if(Gate::denies('diarios_aluno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diariosAluno->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiariosAlunoRequest $request)
    {
        $diariosAlunos = DiariosAluno::find(request('ids'));

        foreach ($diariosAlunos as $diariosAluno) {
            $diariosAluno->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('diarios_aluno_create') && Gate::denies('diarios_aluno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DiariosAluno();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
