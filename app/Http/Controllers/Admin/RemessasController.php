<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRemessaRequest;
use App\Http\Requests\StoreRemessaRequest;
use App\Http\Requests\UpdateRemessaRequest;
use App\Models\Banco;
use App\Models\Remessa;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RemessasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('remessa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remessas = Remessa::with(['banco'])->get();

        return view('admin.remessas.index', compact('remessas'));
    }

    public function create()
    {
        abort_if(Gate::denies('remessa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::pluck('conta', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.remessas.create', compact('bancos'));
    }

    public function store(StoreRemessaRequest $request)
    {
        $remessa = Remessa::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $remessa->id]);
        }

        return redirect()->route('admin.remessas.index');
    }

    public function edit(Remessa $remessa)
    {
        abort_if(Gate::denies('remessa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::pluck('conta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $remessa->load('banco');

        return view('admin.remessas.edit', compact('bancos', 'remessa'));
    }

    public function update(UpdateRemessaRequest $request, Remessa $remessa)
    {
        $remessa->update($request->all());

        return redirect()->route('admin.remessas.index');
    }

    public function show(Remessa $remessa)
    {
        abort_if(Gate::denies('remessa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remessa->load('banco');

        return view('admin.remessas.show', compact('remessa'));
    }

    public function destroy(Remessa $remessa)
    {
        abort_if(Gate::denies('remessa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remessa->delete();

        return back();
    }

    public function massDestroy(MassDestroyRemessaRequest $request)
    {
        $remessas = Remessa::find(request('ids'));

        foreach ($remessas as $remessa) {
            $remessa->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('remessa_create') && Gate::denies('remessa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Remessa();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
