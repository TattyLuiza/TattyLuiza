<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/acessos*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/acessos*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('acesso_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.acessos.index") }}" class="nav-link {{ request()->is("admin/acessos") || request()->is("admin/acessos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bullseye">

                                        </i>
                                        <p>
                                            {{ trans('cruds.acesso.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('cadastro_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/alunos*") ? "menu-open" : "" }} {{ request()->is("admin/matriculas*") ? "menu-open" : "" }} {{ request()->is("admin/responsaveis*") ? "menu-open" : "" }} {{ request()->is("admin/professors*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/alunos*") ? "active" : "" }} {{ request()->is("admin/matriculas*") ? "active" : "" }} {{ request()->is("admin/responsaveis*") ? "active" : "" }} {{ request()->is("admin/professors*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-align-justify">

                            </i>
                            <p>
                                {{ trans('cruds.cadastro.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('aluno_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.alunos.index") }}" class="nav-link {{ request()->is("admin/alunos") || request()->is("admin/alunos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.aluno.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('matricula_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.matriculas.index") }}" class="nav-link {{ request()->is("admin/matriculas") || request()->is("admin/matriculas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-hubspot">

                                        </i>
                                        <p>
                                            {{ trans('cruds.matricula.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('responsavei_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.responsaveis.index") }}" class="nav-link {{ request()->is("admin/responsaveis") || request()->is("admin/responsaveis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.responsavei.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('professor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.professors.index") }}" class="nav-link {{ request()->is("admin/professors") || request()->is("admin/professors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bezier-curve">

                                        </i>
                                        <p>
                                            {{ trans('cruds.professor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('pedagogico_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/anos*") ? "menu-open" : "" }} {{ request()->is("admin/turmas*") ? "menu-open" : "" }} {{ request()->is("admin/planos-aulas*") ? "menu-open" : "" }} {{ request()->is("admin/horarios*") ? "menu-open" : "" }} {{ request()->is("admin/horario-semanals*") ? "menu-open" : "" }} {{ request()->is("admin/dias-letivos*") ? "menu-open" : "" }} {{ request()->is("admin/boletins*") ? "menu-open" : "" }} {{ request()->is("admin/diarios*") ? "menu-open" : "" }} {{ request()->is("admin/diarios-alunos*") ? "menu-open" : "" }} {{ request()->is("admin/conceitos*") ? "menu-open" : "" }} {{ request()->is("admin/seriess*") ? "menu-open" : "" }} {{ request()->is("admin/disciplinas*") ? "menu-open" : "" }} {{ request()->is("admin/seriedisciplinas*") ? "menu-open" : "" }} {{ request()->is("admin/turmaprofessordisciplinas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/anos*") ? "active" : "" }} {{ request()->is("admin/turmas*") ? "active" : "" }} {{ request()->is("admin/planos-aulas*") ? "active" : "" }} {{ request()->is("admin/horarios*") ? "active" : "" }} {{ request()->is("admin/horario-semanals*") ? "active" : "" }} {{ request()->is("admin/dias-letivos*") ? "active" : "" }} {{ request()->is("admin/boletins*") ? "active" : "" }} {{ request()->is("admin/diarios*") ? "active" : "" }} {{ request()->is("admin/diarios-alunos*") ? "active" : "" }} {{ request()->is("admin/conceitos*") ? "active" : "" }} {{ request()->is("admin/seriess*") ? "active" : "" }} {{ request()->is("admin/disciplinas*") ? "active" : "" }} {{ request()->is("admin/seriedisciplinas*") ? "active" : "" }} {{ request()->is("admin/turmaprofessordisciplinas*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-calendar-plus">

                            </i>
                            <p>
                                {{ trans('cruds.pedagogico.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('ano_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.anos.index") }}" class="nav-link {{ request()->is("admin/anos") || request()->is("admin/anos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ano.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('turma_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.turmas.index") }}" class="nav-link {{ request()->is("admin/turmas") || request()->is("admin/turmas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.turma.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('planos_aula_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.planos-aulas.index") }}" class="nav-link {{ request()->is("admin/planos-aulas") || request()->is("admin/planos-aulas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.planosAula.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('horario_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.horarios.index") }}" class="nav-link {{ request()->is("admin/horarios") || request()->is("admin/horarios/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.horario.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('horario_semanal_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.horario-semanals.index") }}" class="nav-link {{ request()->is("admin/horario-semanals") || request()->is("admin/horario-semanals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.horarioSemanal.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dias_letivo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dias-letivos.index") }}" class="nav-link {{ request()->is("admin/dias-letivos") || request()->is("admin/dias-letivos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.diasLetivo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('boletin_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.boletins.index") }}" class="nav-link {{ request()->is("admin/boletins") || request()->is("admin/boletins/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-chart-bar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.boletin.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('diario_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.diarios.index") }}" class="nav-link {{ request()->is("admin/diarios") || request()->is("admin/diarios/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.diario.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('diarios_aluno_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.diarios-alunos.index") }}" class="nav-link {{ request()->is("admin/diarios-alunos") || request()->is("admin/diarios-alunos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-child">

                                        </i>
                                        <p>
                                            {{ trans('cruds.diariosAluno.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('conceito_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.conceitos.index") }}" class="nav-link {{ request()->is("admin/conceitos") || request()->is("admin/conceitos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-closed-captioning">

                                        </i>
                                        <p>
                                            {{ trans('cruds.conceito.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('series_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.seriess.index") }}" class="nav-link {{ request()->is("admin/seriess") || request()->is("admin/seriess/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.series.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('disciplina_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.disciplinas.index") }}" class="nav-link {{ request()->is("admin/disciplinas") || request()->is("admin/disciplinas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.disciplina.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('seriedisciplina_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.seriedisciplinas.index") }}" class="nav-link {{ request()->is("admin/seriedisciplinas") || request()->is("admin/seriedisciplinas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.seriedisciplina.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('turmaprofessordisciplina_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.turmaprofessordisciplinas.index") }}" class="nav-link {{ request()->is("admin/turmaprofessordisciplinas") || request()->is("admin/turmaprofessordisciplinas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.turmaprofessordisciplina.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('comunicacao_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/recados-tarefas-alunos*") ? "menu-open" : "" }} {{ request()->is("admin/recado-tarefas-professores*") ? "menu-open" : "" }} {{ request()->is("admin/emails*") ? "menu-open" : "" }} {{ request()->is("admin/emails-enviados*") ? "menu-open" : "" }} {{ request()->is("admin/recado-professores*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/recados-tarefas-alunos*") ? "active" : "" }} {{ request()->is("admin/recado-tarefas-professores*") ? "active" : "" }} {{ request()->is("admin/emails*") ? "active" : "" }} {{ request()->is("admin/emails-enviados*") ? "active" : "" }} {{ request()->is("admin/recado-professores*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-bullhorn">

                            </i>
                            <p>
                                {{ trans('cruds.comunicacao.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('recados_tarefas_aluno_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.recados-tarefas-alunos.index") }}" class="nav-link {{ request()->is("admin/recados-tarefas-alunos") || request()->is("admin/recados-tarefas-alunos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-align-justify">

                                        </i>
                                        <p>
                                            {{ trans('cruds.recadosTarefasAluno.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('recado_tarefas_professore_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.recado-tarefas-professores.index") }}" class="nav-link {{ request()->is("admin/recado-tarefas-professores") || request()->is("admin/recado-tarefas-professores/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-align-right">

                                        </i>
                                        <p>
                                            {{ trans('cruds.recadoTarefasProfessore.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('email_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.emails.index") }}" class="nav-link {{ request()->is("admin/emails") || request()->is("admin/emails/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-envelope">

                                        </i>
                                        <p>
                                            {{ trans('cruds.email.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('emails_enviado_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.emails-enviados.index") }}" class="nav-link {{ request()->is("admin/emails-enviados") || request()->is("admin/emails-enviados/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-envelope-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.emailsEnviado.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('recado_professore_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.recado-professores.index") }}" class="nav-link {{ request()->is("admin/recado-professores") || request()->is("admin/recado-professores/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-align-justify">

                                        </i>
                                        <p>
                                            {{ trans('cruds.recadoProfessore.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('financeiro_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/bancos*") ? "menu-open" : "" }} {{ request()->is("admin/boletos*") ? "menu-open" : "" }} {{ request()->is("admin/remessas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/bancos*") ? "active" : "" }} {{ request()->is("admin/boletos*") ? "active" : "" }} {{ request()->is("admin/remessas*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-money-bill-wave">

                            </i>
                            <p>
                                {{ trans('cruds.financeiro.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('banco_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.bancos.index") }}" class="nav-link {{ request()->is("admin/bancos") || request()->is("admin/bancos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.banco.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('boleto_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.boletos.index") }}" class="nav-link {{ request()->is("admin/boletos") || request()->is("admin/boletos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.boleto.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('remessa_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.remessas.index") }}" class="nav-link {{ request()->is("admin/remessas") || request()->is("admin/remessas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-amazon-pay">

                                        </i>
                                        <p>
                                            {{ trans('cruds.remessa.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>