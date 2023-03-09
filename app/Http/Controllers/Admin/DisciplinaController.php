<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDisciplinaRequest;
use App\Http\Requests\StoreDisciplinaRequest;
use App\Http\Requests\UpdateDisciplinaRequest;
use App\Models\Disciplina;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DisciplinaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('disciplina_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disciplinas = Disciplina::all();

        return view('admin.disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        abort_if(Gate::denies('disciplina_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disciplinas.create');
    }

    public function store(StoreDisciplinaRequest $request)
    {
        $disciplina = Disciplina::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $disciplina->id]);
        }

        return redirect()->route('admin.disciplinas.index');
    }

    public function edit(Disciplina $disciplina)
    {
        abort_if(Gate::denies('disciplina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disciplinas.edit', compact('disciplina'));
    }

    public function update(UpdateDisciplinaRequest $request, Disciplina $disciplina)
    {
        $disciplina->update($request->all());

        return redirect()->route('admin.disciplinas.index');
    }

    public function show(Disciplina $disciplina)
    {
        abort_if(Gate::denies('disciplina_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disciplinas.show', compact('disciplina'));
    }

    public function destroy(Disciplina $disciplina)
    {
        abort_if(Gate::denies('disciplina_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disciplina->delete();

        return back();
    }

    public function massDestroy(MassDestroyDisciplinaRequest $request)
    {
        $disciplinas = Disciplina::find(request('ids'));

        foreach ($disciplinas as $disciplina) {
            $disciplina->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('disciplina_create') && Gate::denies('disciplina_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Disciplina();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
