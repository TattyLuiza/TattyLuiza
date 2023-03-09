<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAlunoRequest;
use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use App\Models\Responsavei;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AlunoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('aluno_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alunos = Aluno::with(['mae', 'pai', 'financeiro', 'media'])->get();

        return view('admin.alunos.index', compact('alunos'));
    }

    public function create()
    {
        abort_if(Gate::denies('aluno_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maes = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pais = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financeiros = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.alunos.create', compact('financeiros', 'maes', 'pais'));
    }

    public function store(StoreAlunoRequest $request)
    {
        $aluno = Aluno::create($request->all());

        if ($request->input('foto', false)) {
            $aluno->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto'))))->toMediaCollection('foto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $aluno->id]);
        }

        return redirect()->route('admin.alunos.index');
    }

    public function edit(Aluno $aluno)
    {
        abort_if(Gate::denies('aluno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maes = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pais = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financeiros = Responsavei::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aluno->load('mae', 'pai', 'financeiro');

        return view('admin.alunos.edit', compact('aluno', 'financeiros', 'maes', 'pais'));
    }

    public function update(UpdateAlunoRequest $request, Aluno $aluno)
    {
        $aluno->update($request->all());

        if ($request->input('foto', false)) {
            if (! $aluno->foto || $request->input('foto') !== $aluno->foto->file_name) {
                if ($aluno->foto) {
                    $aluno->foto->delete();
                }
                $aluno->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto'))))->toMediaCollection('foto');
            }
        } elseif ($aluno->foto) {
            $aluno->foto->delete();
        }

        return redirect()->route('admin.alunos.index');
    }

    public function show(Aluno $aluno)
    {
        abort_if(Gate::denies('aluno_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aluno->load('mae', 'pai', 'financeiro', 'alunoMatriculas');

        return view('admin.alunos.show', compact('aluno'));
    }

    public function destroy(Aluno $aluno)
    {
        abort_if(Gate::denies('aluno_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aluno->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlunoRequest $request)
    {
        $alunos = Aluno::find(request('ids'));

        foreach ($alunos as $aluno) {
            $aluno->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('aluno_create') && Gate::denies('aluno_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Aluno();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
