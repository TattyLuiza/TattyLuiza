<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Aluno
    Route::delete('alunos/destroy', 'AlunoController@massDestroy')->name('alunos.massDestroy');
    Route::post('alunos/media', 'AlunoController@storeMedia')->name('alunos.storeMedia');
    Route::post('alunos/ckmedia', 'AlunoController@storeCKEditorImages')->name('alunos.storeCKEditorImages');
    Route::resource('alunos', 'AlunoController');

    // Turmas
    Route::delete('turmas/destroy', 'TurmasController@massDestroy')->name('turmas.massDestroy');
    Route::post('turmas/media', 'TurmasController@storeMedia')->name('turmas.storeMedia');
    Route::post('turmas/ckmedia', 'TurmasController@storeCKEditorImages')->name('turmas.storeCKEditorImages');
    Route::resource('turmas', 'TurmasController');

    // Matricula
    Route::delete('matriculas/destroy', 'MatriculaController@massDestroy')->name('matriculas.massDestroy');
    Route::resource('matriculas', 'MatriculaController');

    // Ano
    Route::delete('anos/destroy', 'AnoController@massDestroy')->name('anos.massDestroy');
    Route::resource('anos', 'AnoController');

    // Professor
    Route::delete('professors/destroy', 'ProfessorController@massDestroy')->name('professors.massDestroy');
    Route::post('professors/media', 'ProfessorController@storeMedia')->name('professors.storeMedia');
    Route::post('professors/ckmedia', 'ProfessorController@storeCKEditorImages')->name('professors.storeCKEditorImages');
    Route::resource('professors', 'ProfessorController');

    // Recados Tarefas Alunos
    Route::delete('recados-tarefas-alunos/destroy', 'RecadosTarefasAlunosController@massDestroy')->name('recados-tarefas-alunos.massDestroy');
    Route::post('recados-tarefas-alunos/media', 'RecadosTarefasAlunosController@storeMedia')->name('recados-tarefas-alunos.storeMedia');
    Route::post('recados-tarefas-alunos/ckmedia', 'RecadosTarefasAlunosController@storeCKEditorImages')->name('recados-tarefas-alunos.storeCKEditorImages');
    Route::resource('recados-tarefas-alunos', 'RecadosTarefasAlunosController');

    // Recado Tarefas Professores
    Route::delete('recado-tarefas-professores/destroy', 'RecadoTarefasProfessoresController@massDestroy')->name('recado-tarefas-professores.massDestroy');
    Route::post('recado-tarefas-professores/media', 'RecadoTarefasProfessoresController@storeMedia')->name('recado-tarefas-professores.storeMedia');
    Route::post('recado-tarefas-professores/ckmedia', 'RecadoTarefasProfessoresController@storeCKEditorImages')->name('recado-tarefas-professores.storeCKEditorImages');
    Route::resource('recado-tarefas-professores', 'RecadoTarefasProfessoresController');

    // Email
    Route::delete('emails/destroy', 'EmailController@massDestroy')->name('emails.massDestroy');
    Route::resource('emails', 'EmailController');

    // Emails Enviados
    Route::delete('emails-enviados/destroy', 'EmailsEnviadosController@massDestroy')->name('emails-enviados.massDestroy');
    Route::resource('emails-enviados', 'EmailsEnviadosController');

    // Recado Professores
    Route::delete('recado-professores/destroy', 'RecadoProfessoresController@massDestroy')->name('recado-professores.massDestroy');
    Route::post('recado-professores/media', 'RecadoProfessoresController@storeMedia')->name('recado-professores.storeMedia');
    Route::post('recado-professores/ckmedia', 'RecadoProfessoresController@storeCKEditorImages')->name('recado-professores.storeCKEditorImages');
    Route::resource('recado-professores', 'RecadoProfessoresController');

    // Planos Aulas
    Route::delete('planos-aulas/destroy', 'PlanosAulasController@massDestroy')->name('planos-aulas.massDestroy');
    Route::post('planos-aulas/media', 'PlanosAulasController@storeMedia')->name('planos-aulas.storeMedia');
    Route::post('planos-aulas/ckmedia', 'PlanosAulasController@storeCKEditorImages')->name('planos-aulas.storeCKEditorImages');
    Route::resource('planos-aulas', 'PlanosAulasController');

    // Horario Semanal
    Route::delete('horario-semanals/destroy', 'HorarioSemanalController@massDestroy')->name('horario-semanals.massDestroy');
    Route::resource('horario-semanals', 'HorarioSemanalController');

    // Horarios
    Route::delete('horarios/destroy', 'HorariosController@massDestroy')->name('horarios.massDestroy');
    Route::resource('horarios', 'HorariosController');

    // Dias Letivos
    Route::delete('dias-letivos/destroy', 'DiasLetivosController@massDestroy')->name('dias-letivos.massDestroy');
    Route::resource('dias-letivos', 'DiasLetivosController');

    // Boletins
    Route::delete('boletins/destroy', 'BoletinsController@massDestroy')->name('boletins.massDestroy');
    Route::resource('boletins', 'BoletinsController');

    // Acessos
    Route::delete('acessos/destroy', 'AcessosController@massDestroy')->name('acessos.massDestroy');
    Route::resource('acessos', 'AcessosController');

    // Diarios
    Route::delete('diarios/destroy', 'DiariosController@massDestroy')->name('diarios.massDestroy');
    Route::post('diarios/media', 'DiariosController@storeMedia')->name('diarios.storeMedia');
    Route::post('diarios/ckmedia', 'DiariosController@storeCKEditorImages')->name('diarios.storeCKEditorImages');
    Route::resource('diarios', 'DiariosController');

    // Diarios Alunos
    Route::delete('diarios-alunos/destroy', 'DiariosAlunosController@massDestroy')->name('diarios-alunos.massDestroy');
    Route::post('diarios-alunos/media', 'DiariosAlunosController@storeMedia')->name('diarios-alunos.storeMedia');
    Route::post('diarios-alunos/ckmedia', 'DiariosAlunosController@storeCKEditorImages')->name('diarios-alunos.storeCKEditorImages');
    Route::resource('diarios-alunos', 'DiariosAlunosController');

    // Conceitos
    Route::delete('conceitos/destroy', 'ConceitosController@massDestroy')->name('conceitos.massDestroy');
    Route::post('conceitos/media', 'ConceitosController@storeMedia')->name('conceitos.storeMedia');
    Route::post('conceitos/ckmedia', 'ConceitosController@storeCKEditorImages')->name('conceitos.storeCKEditorImages');
    Route::resource('conceitos', 'ConceitosController');

    // Bancos
    Route::delete('bancos/destroy', 'BancosController@massDestroy')->name('bancos.massDestroy');
    Route::post('bancos/media', 'BancosController@storeMedia')->name('bancos.storeMedia');
    Route::post('bancos/ckmedia', 'BancosController@storeCKEditorImages')->name('bancos.storeCKEditorImages');
    Route::resource('bancos', 'BancosController');

    // Boletos
    Route::delete('boletos/destroy', 'BoletosController@massDestroy')->name('boletos.massDestroy');
    Route::resource('boletos', 'BoletosController');

    // Remessas
    Route::delete('remessas/destroy', 'RemessasController@massDestroy')->name('remessas.massDestroy');
    Route::post('remessas/media', 'RemessasController@storeMedia')->name('remessas.storeMedia');
    Route::post('remessas/ckmedia', 'RemessasController@storeCKEditorImages')->name('remessas.storeCKEditorImages');
    Route::resource('remessas', 'RemessasController');

    // Responsavei
    Route::delete('responsaveis/destroy', 'ResponsaveiController@massDestroy')->name('responsaveis.massDestroy');
    Route::resource('responsaveis', 'ResponsaveiController');

    // Serie
    Route::delete('seriess/destroy', 'SerieController@massDestroy')->name('seriess.massDestroy');
    Route::resource('seriess', 'SerieController');

    // Disciplina
    Route::delete('disciplinas/destroy', 'DisciplinaController@massDestroy')->name('disciplinas.massDestroy');
    Route::post('disciplinas/media', 'DisciplinaController@storeMedia')->name('disciplinas.storeMedia');
    Route::post('disciplinas/ckmedia', 'DisciplinaController@storeCKEditorImages')->name('disciplinas.storeCKEditorImages');
    Route::resource('disciplinas', 'DisciplinaController');

    // Seriedisciplina
    Route::delete('seriedisciplinas/destroy', 'SeriedisciplinaController@massDestroy')->name('seriedisciplinas.massDestroy');
    Route::resource('seriedisciplinas', 'SeriedisciplinaController');

    // Turmaprofessordisciplina
    Route::delete('turmaprofessordisciplinas/destroy', 'TurmaprofessordisciplinaController@massDestroy')->name('turmaprofessordisciplinas.massDestroy');
    Route::resource('turmaprofessordisciplinas', 'TurmaprofessordisciplinaController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
