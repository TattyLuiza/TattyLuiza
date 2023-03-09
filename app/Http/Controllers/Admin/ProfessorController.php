<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProfessorRequest;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Models\Professor;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProfessorController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('professor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $professors = Professor::with(['user', 'media'])->get();

        return view('admin.professors.index', compact('professors'));
    }

    public function create()
    {
        abort_if(Gate::denies('professor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.professors.create', compact('users'));
    }

    public function store(StoreProfessorRequest $request)
    {
        $professor = Professor::create($request->all());

        if ($request->input('foto', false)) {
            $professor->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto'))))->toMediaCollection('foto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $professor->id]);
        }

        return redirect()->route('admin.professors.index');
    }

    public function edit(Professor $professor)
    {
        abort_if(Gate::denies('professor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $professor->load('user');

        return view('admin.professors.edit', compact('professor', 'users'));
    }

    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        $professor->update($request->all());

        if ($request->input('foto', false)) {
            if (! $professor->foto || $request->input('foto') !== $professor->foto->file_name) {
                if ($professor->foto) {
                    $professor->foto->delete();
                }
                $professor->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto'))))->toMediaCollection('foto');
            }
        } elseif ($professor->foto) {
            $professor->foto->delete();
        }

        return redirect()->route('admin.professors.index');
    }

    public function show(Professor $professor)
    {
        abort_if(Gate::denies('professor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $professor->load('user', 'professorHorarioSemanals', 'professorDiarios');

        return view('admin.professors.show', compact('professor'));
    }

    public function destroy(Professor $professor)
    {
        abort_if(Gate::denies('professor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $professor->delete();

        return back();
    }

    public function massDestroy(MassDestroyProfessorRequest $request)
    {
        $professors = Professor::find(request('ids'));

        foreach ($professors as $professor) {
            $professor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('professor_create') && Gate::denies('professor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Professor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
