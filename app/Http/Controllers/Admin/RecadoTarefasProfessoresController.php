<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRecadoTarefasProfessoreRequest;
use App\Http\Requests\StoreRecadoTarefasProfessoreRequest;
use App\Http\Requests\UpdateRecadoTarefasProfessoreRequest;
use App\Models\Aluno;
use App\Models\RecadoTarefasProfessore;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RecadoTarefasProfessoresController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('recado_tarefas_professore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadoTarefasProfessores = RecadoTarefasProfessore::with(['id_professors'])->get();

        return view('admin.recadoTarefasProfessores.index', compact('recadoTarefasProfessores'));
    }

    public function create()
    {
        abort_if(Gate::denies('recado_tarefas_professore_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_professors = Aluno::pluck('nome', 'id');

        return view('admin.recadoTarefasProfessores.create', compact('id_professors'));
    }

    public function store(StoreRecadoTarefasProfessoreRequest $request)
    {
        $recadoTarefasProfessore = RecadoTarefasProfessore::create($request->all());
        $recadoTarefasProfessore->id_professors()->sync($request->input('id_professors', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $recadoTarefasProfessore->id]);
        }

        return redirect()->route('admin.recado-tarefas-professores.index');
    }

    public function edit(RecadoTarefasProfessore $recadoTarefasProfessore)
    {
        abort_if(Gate::denies('recado_tarefas_professore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_professors = Aluno::pluck('nome', 'id');

        $recadoTarefasProfessore->load('id_professors');

        return view('admin.recadoTarefasProfessores.edit', compact('id_professors', 'recadoTarefasProfessore'));
    }

    public function update(UpdateRecadoTarefasProfessoreRequest $request, RecadoTarefasProfessore $recadoTarefasProfessore)
    {
        $recadoTarefasProfessore->update($request->all());
        $recadoTarefasProfessore->id_professors()->sync($request->input('id_professors', []));

        return redirect()->route('admin.recado-tarefas-professores.index');
    }

    public function show(RecadoTarefasProfessore $recadoTarefasProfessore)
    {
        abort_if(Gate::denies('recado_tarefas_professore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadoTarefasProfessore->load('id_professors');

        return view('admin.recadoTarefasProfessores.show', compact('recadoTarefasProfessore'));
    }

    public function destroy(RecadoTarefasProfessore $recadoTarefasProfessore)
    {
        abort_if(Gate::denies('recado_tarefas_professore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadoTarefasProfessore->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecadoTarefasProfessoreRequest $request)
    {
        $recadoTarefasProfessores = RecadoTarefasProfessore::find(request('ids'));

        foreach ($recadoTarefasProfessores as $recadoTarefasProfessore) {
            $recadoTarefasProfessore->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('recado_tarefas_professore_create') && Gate::denies('recado_tarefas_professore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RecadoTarefasProfessore();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
