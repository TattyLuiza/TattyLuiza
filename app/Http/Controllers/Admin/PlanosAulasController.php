<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPlanosAulaRequest;
use App\Http\Requests\StorePlanosAulaRequest;
use App\Http\Requests\UpdatePlanosAulaRequest;
use App\Models\DiasLetivo;
use App\Models\Disciplina;
use App\Models\Horario;
use App\Models\PlanosAula;
use App\Models\Professor;
use App\Models\Turma;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PlanosAulasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('planos_aula_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planosAulas = PlanosAula::with(['horario', 'disciplina', 'turma', 'professor', 'dia_letivo'])->get();

        return view('admin.planosAulas.index', compact('planosAulas'));
    }

    public function create()
    {
        abort_if(Gate::denies('planos_aula_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarios = Horario::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dia_letivos = DiasLetivo::pluck('data', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.planosAulas.create', compact('dia_letivos', 'disciplinas', 'horarios', 'professors', 'turmas'));
    }

    public function store(StorePlanosAulaRequest $request)
    {
        $planosAula = PlanosAula::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $planosAula->id]);
        }

        return redirect()->route('admin.planos-aulas.index');
    }

    public function edit(PlanosAula $planosAula)
    {
        abort_if(Gate::denies('planos_aula_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $horarios = Horario::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplinas = Disciplina::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professors = Professor::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dia_letivos = DiasLetivo::pluck('data', 'id')->prepend(trans('global.pleaseSelect'), '');

        $planosAula->load('horario', 'disciplina', 'turma', 'professor', 'dia_letivo');

        return view('admin.planosAulas.edit', compact('dia_letivos', 'disciplinas', 'horarios', 'planosAula', 'professors', 'turmas'));
    }

    public function update(UpdatePlanosAulaRequest $request, PlanosAula $planosAula)
    {
        $planosAula->update($request->all());

        return redirect()->route('admin.planos-aulas.index');
    }

    public function show(PlanosAula $planosAula)
    {
        abort_if(Gate::denies('planos_aula_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planosAula->load('horario', 'disciplina', 'turma', 'professor', 'dia_letivo');

        return view('admin.planosAulas.show', compact('planosAula'));
    }

    public function destroy(PlanosAula $planosAula)
    {
        abort_if(Gate::denies('planos_aula_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planosAula->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlanosAulaRequest $request)
    {
        $planosAulas = PlanosAula::find(request('ids'));

        foreach ($planosAulas as $planosAula) {
            $planosAula->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('planos_aula_create') && Gate::denies('planos_aula_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PlanosAula();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
