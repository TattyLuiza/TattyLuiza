<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDiarioRequest;
use App\Http\Requests\StoreDiarioRequest;
use App\Http\Requests\UpdateDiarioRequest;
use App\Models\Diario;
use App\Models\DiasLetivo;
use App\Models\Disciplina;
use App\Models\Horario;
use App\Models\Professor;
use App\Models\Turma;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DiariosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('diario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diarios = Diario::with(['dia_letivo', 'horario', 'turma', 'disciplina', 'professor'])->get();

        return view('admin.diarios.index', compact('diarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('diario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dia_letivos = DiasLetivo::pluck('data', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horarios = Horario::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.diarios.create', compact('dia_letivos', 'disciplinas', 'horarios', 'professors', 'turmas'));
    }

    public function store(StoreDiarioRequest $request)
    {
        $diario = Diario::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $diario->id]);
        }

        return redirect()->route('admin.diarios.index');
    }

    public function edit(Diario $diario)
    {
        abort_if(Gate::denies('diario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dia_letivos = DiasLetivo::pluck('data', 'id')->prepend(trans('global.pleaseSelect'), '');

        $horarios = Horario::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diario->load('dia_letivo', 'horario', 'turma', 'disciplina', 'professor');

        return view('admin.diarios.edit', compact('dia_letivos', 'diario', 'disciplinas', 'horarios', 'professors', 'turmas'));
    }

    public function update(UpdateDiarioRequest $request, Diario $diario)
    {
        $diario->update($request->all());

        return redirect()->route('admin.diarios.index');
    }

    public function show(Diario $diario)
    {
        abort_if(Gate::denies('diario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diario->load('dia_letivo', 'horario', 'turma', 'disciplina', 'professor', 'diarioDiariosAlunos');

        return view('admin.diarios.show', compact('diario'));
    }

    public function destroy(Diario $diario)
    {
        abort_if(Gate::denies('diario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diario->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiarioRequest $request)
    {
        $diarios = Diario::find(request('ids'));

        foreach ($diarios as $diario) {
            $diario->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('diario_create') && Gate::denies('diario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Diario();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
