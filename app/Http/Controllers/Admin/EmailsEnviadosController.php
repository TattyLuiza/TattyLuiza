<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmailsEnviadoRequest;
use App\Http\Requests\StoreEmailsEnviadoRequest;
use App\Http\Requests\UpdateEmailsEnviadoRequest;
use App\Models\Aluno;
use App\Models\EmailsEnviado;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailsEnviadosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('emails_enviado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailsEnviados = EmailsEnviado::with(['id_emails'])->get();

        return view('admin.emailsEnviados.index', compact('emailsEnviados'));
    }

    public function create()
    {
        abort_if(Gate::denies('emails_enviado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_emails = Aluno::pluck('nome', 'id');

        return view('admin.emailsEnviados.create', compact('id_emails'));
    }

    public function store(StoreEmailsEnviadoRequest $request)
    {
        $emailsEnviado = EmailsEnviado::create($request->all());
        $emailsEnviado->id_emails()->sync($request->input('id_emails', []));

        return redirect()->route('admin.emails-enviados.index');
    }

    public function edit(EmailsEnviado $emailsEnviado)
    {
        abort_if(Gate::denies('emails_enviado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_emails = Aluno::pluck('nome', 'id');

        $emailsEnviado->load('id_emails');

        return view('admin.emailsEnviados.edit', compact('emailsEnviado', 'id_emails'));
    }

    public function update(UpdateEmailsEnviadoRequest $request, EmailsEnviado $emailsEnviado)
    {
        $emailsEnviado->update($request->all());
        $emailsEnviado->id_emails()->sync($request->input('id_emails', []));

        return redirect()->route('admin.emails-enviados.index');
    }

    public function show(EmailsEnviado $emailsEnviado)
    {
        abort_if(Gate::denies('emails_enviado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailsEnviado->load('id_emails');

        return view('admin.emailsEnviados.show', compact('emailsEnviado'));
    }

    public function destroy(EmailsEnviado $emailsEnviado)
    {
        abort_if(Gate::denies('emails_enviado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailsEnviado->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmailsEnviadoRequest $request)
    {
        $emailsEnviados = EmailsEnviado::find(request('ids'));

        foreach ($emailsEnviados as $emailsEnviado) {
            $emailsEnviado->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
