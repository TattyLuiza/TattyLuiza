<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTurmaRequest;
use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\UpdateTurmaRequest;
use App\Models\Ano;
use App\Models\Banco;
use App\Models\Series;
use App\Models\Turma;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TurmasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('turma_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turmas = Turma::with(['serie', 'banco', 'ano'])->get();

        return view('admin.turmas.index', compact('turmas'));
    }

    public function create()
    {
        abort_if(Gate::denies('turma_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Series::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bancos = Banco::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.turmas.create', compact('anos', 'bancos', 'series'));
    }

    public function store(StoreTurmaRequest $request)
    {
        $turma = Turma::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $turma->id]);
        }

        return redirect()->route('admin.turmas.index');
    }

    public function edit(Turma $turma)
    {
        abort_if(Gate::denies('turma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Series::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bancos = Banco::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $anos = Ano::pluck('ano', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turma->load('serie', 'banco', 'ano');

        return view('admin.turmas.edit', compact('anos', 'bancos', 'series', 'turma'));
    }

    public function update(UpdateTurmaRequest $request, Turma $turma)
    {
        $turma->update($request->all());

        return redirect()->route('admin.turmas.index');
    }

    public function show(Turma $turma)
    {
        abort_if(Gate::denies('turma_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turma->load('serie', 'banco', 'ano', 'turmaMatriculas', 'turmaPlanosAulas', 'turmaHorarioSemanals');

        return view('admin.turmas.show', compact('turma'));
    }

    public function destroy(Turma $turma)
    {
        abort_if(Gate::denies('turma_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turma->delete();

        return back();
    }

    public function massDestroy(MassDestroyTurmaRequest $request)
    {
        $turmas = Turma::find(request('ids'));

        foreach ($turmas as $turma) {
            $turma->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('turma_create') && Gate::denies('turma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Turma();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
