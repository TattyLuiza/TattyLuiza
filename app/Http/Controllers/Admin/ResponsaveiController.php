<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResponsaveiRequest;
use App\Http\Requests\StoreResponsaveiRequest;
use App\Http\Requests\UpdateResponsaveiRequest;
use App\Models\Responsavei;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponsaveiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('responsavei_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsaveis = Responsavei::all();

        return view('admin.responsaveis.index', compact('responsaveis'));
    }

    public function create()
    {
        abort_if(Gate::denies('responsavei_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.responsaveis.create');
    }

    public function store(StoreResponsaveiRequest $request)
    {
        $responsavei = Responsavei::create($request->all());

        return redirect()->route('admin.responsaveis.index');
    }

    public function edit(Responsavei $responsavei)
    {
        abort_if(Gate::denies('responsavei_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.responsaveis.edit', compact('responsavei'));
    }

    public function update(UpdateResponsaveiRequest $request, Responsavei $responsavei)
    {
        $responsavei->update($request->all());

        return redirect()->route('admin.responsaveis.index');
    }

    public function show(Responsavei $responsavei)
    {
        abort_if(Gate::denies('responsavei_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavei->load('financeiroAlunos', 'maeAlunos', 'paiAlunos', 'maeMatriculas', 'paiMatriculas');

        return view('admin.responsaveis.show', compact('responsavei'));
    }

    public function destroy(Responsavei $responsavei)
    {
        abort_if(Gate::denies('responsavei_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsavei->delete();

        return back();
    }

    public function massDestroy(MassDestroyResponsaveiRequest $request)
    {
        $responsaveis = Responsavei::find(request('ids'));

        foreach ($responsaveis as $responsavei) {
            $responsavei->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
