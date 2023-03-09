<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRecadoProfessoreRequest;
use App\Http\Requests\StoreRecadoProfessoreRequest;
use App\Http\Requests\UpdateRecadoProfessoreRequest;
use App\Models\Aluno;
use App\Models\RecadoProfessore;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RecadoProfessoresController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('recado_professore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadoProfessores = RecadoProfessore::with(['id_remetentes', 'id_destinatario'])->get();

        return view('admin.recadoProfessores.index', compact('recadoProfessores'));
    }

    public function create()
    {
        abort_if(Gate::denies('recado_professore_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_remetentes = Aluno::pluck('nome', 'id');

        $id_destinatarios = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.recadoProfessores.create', compact('id_destinatarios', 'id_remetentes'));
    }

    public function store(StoreRecadoProfessoreRequest $request)
    {
        $recadoProfessore = RecadoProfessore::create($request->all());
        $recadoProfessore->id_remetentes()->sync($request->input('id_remetentes', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $recadoProfessore->id]);
        }

        return redirect()->route('admin.recado-professores.index');
    }

    public function edit(RecadoProfessore $recadoProfessore)
    {
        abort_if(Gate::denies('recado_professore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_remetentes = Aluno::pluck('nome', 'id');

        $id_destinatarios = Aluno::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $recadoProfessore->load('id_remetentes', 'id_destinatario');

        return view('admin.recadoProfessores.edit', compact('id_destinatarios', 'id_remetentes', 'recadoProfessore'));
    }

    public function update(UpdateRecadoProfessoreRequest $request, RecadoProfessore $recadoProfessore)
    {
        $recadoProfessore->update($request->all());
        $recadoProfessore->id_remetentes()->sync($request->input('id_remetentes', []));

        return redirect()->route('admin.recado-professores.index');
    }

    public function show(RecadoProfessore $recadoProfessore)
    {
        abort_if(Gate::denies('recado_professore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadoProfessore->load('id_remetentes', 'id_destinatario');

        return view('admin.recadoProfessores.show', compact('recadoProfessore'));
    }

    public function destroy(RecadoProfessore $recadoProfessore)
    {
        abort_if(Gate::denies('recado_professore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recadoProfessore->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecadoProfessoreRequest $request)
    {
        $recadoProfessores = RecadoProfessore::find(request('ids'));

        foreach ($recadoProfessores as $recadoProfessore) {
            $recadoProfessore->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('recado_professore_create') && Gate::denies('recado_professore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RecadoProfessore();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
