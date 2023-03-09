<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBancoRequest;
use App\Http\Requests\StoreBancoRequest;
use App\Http\Requests\UpdateBancoRequest;
use App\Models\Banco;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BancosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('banco_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::all();

        return view('admin.bancos.index', compact('bancos'));
    }

    public function create()
    {
        abort_if(Gate::denies('banco_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bancos.create');
    }

    public function store(StoreBancoRequest $request)
    {
        $banco = Banco::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $banco->id]);
        }

        return redirect()->route('admin.bancos.index');
    }

    public function edit(Banco $banco)
    {
        abort_if(Gate::denies('banco_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bancos.edit', compact('banco'));
    }

    public function update(UpdateBancoRequest $request, Banco $banco)
    {
        $banco->update($request->all());

        return redirect()->route('admin.bancos.index');
    }

    public function show(Banco $banco)
    {
        abort_if(Gate::denies('banco_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banco->load('bancoTurmas');

        return view('admin.bancos.show', compact('banco'));
    }

    public function destroy(Banco $banco)
    {
        abort_if(Gate::denies('banco_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banco->delete();

        return back();
    }

    public function massDestroy(MassDestroyBancoRequest $request)
    {
        $bancos = Banco::find(request('ids'));

        foreach ($bancos as $banco) {
            $banco->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('banco_create') && Gate::denies('banco_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Banco();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
