<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyConceitoRequest;
use App\Http\Requests\StoreConceitoRequest;
use App\Http\Requests\UpdateConceitoRequest;
use App\Models\Conceito;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ConceitosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('conceito_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conceitos = Conceito::all();

        return view('admin.conceitos.index', compact('conceitos'));
    }

    public function create()
    {
        abort_if(Gate::denies('conceito_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conceitos.create');
    }

    public function store(StoreConceitoRequest $request)
    {
        $conceito = Conceito::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $conceito->id]);
        }

        return redirect()->route('admin.conceitos.index');
    }

    public function edit(Conceito $conceito)
    {
        abort_if(Gate::denies('conceito_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conceitos.edit', compact('conceito'));
    }

    public function update(UpdateConceitoRequest $request, Conceito $conceito)
    {
        $conceito->update($request->all());

        return redirect()->route('admin.conceitos.index');
    }

    public function show(Conceito $conceito)
    {
        abort_if(Gate::denies('conceito_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conceitos.show', compact('conceito'));
    }

    public function destroy(Conceito $conceito)
    {
        abort_if(Gate::denies('conceito_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conceito->delete();

        return back();
    }

    public function massDestroy(MassDestroyConceitoRequest $request)
    {
        $conceitos = Conceito::find(request('ids'));

        foreach ($conceitos as $conceito) {
            $conceito->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('conceito_create') && Gate::denies('conceito_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Conceito();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
