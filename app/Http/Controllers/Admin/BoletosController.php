<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBoletoRequest;
use App\Http\Requests\StoreBoletoRequest;
use App\Http\Requests\UpdateBoletoRequest;
use App\Models\Banco;
use App\Models\Boleto;
use App\Models\Matricula;
use App\Models\Turma;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoletosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('boleto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boletos = Boleto::with(['banco', 'matricula', 'turma'])->get();

        return view('admin.boletos.index', compact('boletos'));
    }

    public function create()
    {
        abort_if(Gate::denies('boleto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::pluck('conta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matriculas = Matricula::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('tipo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.boletos.create', compact('bancos', 'matriculas', 'turmas'));
    }

    public function store(StoreBoletoRequest $request)
    {
        $boleto = Boleto::create($request->all());

        return redirect()->route('admin.boletos.index');
    }

    public function edit(Boleto $boleto)
    {
        abort_if(Gate::denies('boleto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bancos = Banco::pluck('conta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matriculas = Matricula::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = Turma::pluck('tipo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $boleto->load('banco', 'matricula', 'turma');

        return view('admin.boletos.edit', compact('bancos', 'boleto', 'matriculas', 'turmas'));
    }

    public function update(UpdateBoletoRequest $request, Boleto $boleto)
    {
        $boleto->update($request->all());

        return redirect()->route('admin.boletos.index');
    }

    public function show(Boleto $boleto)
    {
        abort_if(Gate::denies('boleto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boleto->load('banco', 'matricula', 'turma');

        return view('admin.boletos.show', compact('boleto'));
    }

    public function destroy(Boleto $boleto)
    {
        abort_if(Gate::denies('boleto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boleto->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoletoRequest $request)
    {
        $boletos = Boleto::find(request('ids'));

        foreach ($boletos as $boleto) {
            $boleto->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
