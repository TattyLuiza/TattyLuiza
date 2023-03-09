<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcessoRequest;
use App\Http\Requests\StoreAcessoRequest;
use App\Http\Requests\UpdateAcessoRequest;
use App\Models\Acesso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcessosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acesso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acessos = Acesso::all();

        return view('admin.acessos.index', compact('acessos'));
    }

    public function create()
    {
        abort_if(Gate::denies('acesso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acessos.create');
    }

    public function store(StoreAcessoRequest $request)
    {
        $acesso = Acesso::create($request->all());

        return redirect()->route('admin.acessos.index');
    }

    public function edit(Acesso $acesso)
    {
        abort_if(Gate::denies('acesso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acessos.edit', compact('acesso'));
    }

    public function update(UpdateAcessoRequest $request, Acesso $acesso)
    {
        $acesso->update($request->all());

        return redirect()->route('admin.acessos.index');
    }

    public function show(Acesso $acesso)
    {
        abort_if(Gate::denies('acesso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acessos.show', compact('acesso'));
    }

    public function destroy(Acesso $acesso)
    {
        abort_if(Gate::denies('acesso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acesso->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcessoRequest $request)
    {
        $acessos = Acesso::find(request('ids'));

        foreach ($acessos as $acesso) {
            $acesso->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
