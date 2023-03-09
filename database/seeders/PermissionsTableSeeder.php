<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'aluno_create',
            ],
            [
                'id'    => 18,
                'title' => 'aluno_edit',
            ],
            [
                'id'    => 19,
                'title' => 'aluno_show',
            ],
            [
                'id'    => 20,
                'title' => 'aluno_delete',
            ],
            [
                'id'    => 21,
                'title' => 'aluno_access',
            ],
            [
                'id'    => 22,
                'title' => 'cadastro_access',
            ],
            [
                'id'    => 23,
                'title' => 'turma_create',
            ],
            [
                'id'    => 24,
                'title' => 'turma_edit',
            ],
            [
                'id'    => 25,
                'title' => 'turma_show',
            ],
            [
                'id'    => 26,
                'title' => 'turma_delete',
            ],
            [
                'id'    => 27,
                'title' => 'turma_access',
            ],
            [
                'id'    => 28,
                'title' => 'matricula_create',
            ],
            [
                'id'    => 29,
                'title' => 'matricula_edit',
            ],
            [
                'id'    => 30,
                'title' => 'matricula_show',
            ],
            [
                'id'    => 31,
                'title' => 'matricula_delete',
            ],
            [
                'id'    => 32,
                'title' => 'matricula_access',
            ],
            [
                'id'    => 33,
                'title' => 'ano_create',
            ],
            [
                'id'    => 34,
                'title' => 'ano_edit',
            ],
            [
                'id'    => 35,
                'title' => 'ano_show',
            ],
            [
                'id'    => 36,
                'title' => 'ano_delete',
            ],
            [
                'id'    => 37,
                'title' => 'ano_access',
            ],
            [
                'id'    => 38,
                'title' => 'professor_create',
            ],
            [
                'id'    => 39,
                'title' => 'professor_edit',
            ],
            [
                'id'    => 40,
                'title' => 'professor_show',
            ],
            [
                'id'    => 41,
                'title' => 'professor_delete',
            ],
            [
                'id'    => 42,
                'title' => 'professor_access',
            ],
            [
                'id'    => 43,
                'title' => 'comunicacao_access',
            ],
            [
                'id'    => 44,
                'title' => 'recados_tarefas_aluno_create',
            ],
            [
                'id'    => 45,
                'title' => 'recados_tarefas_aluno_edit',
            ],
            [
                'id'    => 46,
                'title' => 'recados_tarefas_aluno_show',
            ],
            [
                'id'    => 47,
                'title' => 'recados_tarefas_aluno_delete',
            ],
            [
                'id'    => 48,
                'title' => 'recados_tarefas_aluno_access',
            ],
            [
                'id'    => 49,
                'title' => 'recado_tarefas_professore_create',
            ],
            [
                'id'    => 50,
                'title' => 'recado_tarefas_professore_edit',
            ],
            [
                'id'    => 51,
                'title' => 'recado_tarefas_professore_show',
            ],
            [
                'id'    => 52,
                'title' => 'recado_tarefas_professore_delete',
            ],
            [
                'id'    => 53,
                'title' => 'recado_tarefas_professore_access',
            ],
            [
                'id'    => 54,
                'title' => 'email_create',
            ],
            [
                'id'    => 55,
                'title' => 'email_edit',
            ],
            [
                'id'    => 56,
                'title' => 'email_show',
            ],
            [
                'id'    => 57,
                'title' => 'email_delete',
            ],
            [
                'id'    => 58,
                'title' => 'email_access',
            ],
            [
                'id'    => 59,
                'title' => 'financeiro_access',
            ],
            [
                'id'    => 60,
                'title' => 'pedagogico_access',
            ],
            [
                'id'    => 61,
                'title' => 'emails_enviado_create',
            ],
            [
                'id'    => 62,
                'title' => 'emails_enviado_edit',
            ],
            [
                'id'    => 63,
                'title' => 'emails_enviado_show',
            ],
            [
                'id'    => 64,
                'title' => 'emails_enviado_delete',
            ],
            [
                'id'    => 65,
                'title' => 'emails_enviado_access',
            ],
            [
                'id'    => 66,
                'title' => 'recado_professore_create',
            ],
            [
                'id'    => 67,
                'title' => 'recado_professore_edit',
            ],
            [
                'id'    => 68,
                'title' => 'recado_professore_show',
            ],
            [
                'id'    => 69,
                'title' => 'recado_professore_delete',
            ],
            [
                'id'    => 70,
                'title' => 'recado_professore_access',
            ],
            [
                'id'    => 71,
                'title' => 'planos_aula_create',
            ],
            [
                'id'    => 72,
                'title' => 'planos_aula_edit',
            ],
            [
                'id'    => 73,
                'title' => 'planos_aula_show',
            ],
            [
                'id'    => 74,
                'title' => 'planos_aula_delete',
            ],
            [
                'id'    => 75,
                'title' => 'planos_aula_access',
            ],
            [
                'id'    => 76,
                'title' => 'horario_semanal_create',
            ],
            [
                'id'    => 77,
                'title' => 'horario_semanal_edit',
            ],
            [
                'id'    => 78,
                'title' => 'horario_semanal_show',
            ],
            [
                'id'    => 79,
                'title' => 'horario_semanal_delete',
            ],
            [
                'id'    => 80,
                'title' => 'horario_semanal_access',
            ],
            [
                'id'    => 81,
                'title' => 'horario_create',
            ],
            [
                'id'    => 82,
                'title' => 'horario_edit',
            ],
            [
                'id'    => 83,
                'title' => 'horario_show',
            ],
            [
                'id'    => 84,
                'title' => 'horario_delete',
            ],
            [
                'id'    => 85,
                'title' => 'horario_access',
            ],
            [
                'id'    => 86,
                'title' => 'dias_letivo_create',
            ],
            [
                'id'    => 87,
                'title' => 'dias_letivo_edit',
            ],
            [
                'id'    => 88,
                'title' => 'dias_letivo_show',
            ],
            [
                'id'    => 89,
                'title' => 'dias_letivo_delete',
            ],
            [
                'id'    => 90,
                'title' => 'dias_letivo_access',
            ],
            [
                'id'    => 91,
                'title' => 'boletin_create',
            ],
            [
                'id'    => 92,
                'title' => 'boletin_edit',
            ],
            [
                'id'    => 93,
                'title' => 'boletin_show',
            ],
            [
                'id'    => 94,
                'title' => 'boletin_delete',
            ],
            [
                'id'    => 95,
                'title' => 'boletin_access',
            ],
            [
                'id'    => 96,
                'title' => 'acesso_create',
            ],
            [
                'id'    => 97,
                'title' => 'acesso_edit',
            ],
            [
                'id'    => 98,
                'title' => 'acesso_show',
            ],
            [
                'id'    => 99,
                'title' => 'acesso_delete',
            ],
            [
                'id'    => 100,
                'title' => 'acesso_access',
            ],
            [
                'id'    => 101,
                'title' => 'diario_create',
            ],
            [
                'id'    => 102,
                'title' => 'diario_edit',
            ],
            [
                'id'    => 103,
                'title' => 'diario_show',
            ],
            [
                'id'    => 104,
                'title' => 'diario_delete',
            ],
            [
                'id'    => 105,
                'title' => 'diario_access',
            ],
            [
                'id'    => 106,
                'title' => 'diarios_aluno_create',
            ],
            [
                'id'    => 107,
                'title' => 'diarios_aluno_edit',
            ],
            [
                'id'    => 108,
                'title' => 'diarios_aluno_show',
            ],
            [
                'id'    => 109,
                'title' => 'diarios_aluno_delete',
            ],
            [
                'id'    => 110,
                'title' => 'diarios_aluno_access',
            ],
            [
                'id'    => 111,
                'title' => 'conceito_create',
            ],
            [
                'id'    => 112,
                'title' => 'conceito_edit',
            ],
            [
                'id'    => 113,
                'title' => 'conceito_show',
            ],
            [
                'id'    => 114,
                'title' => 'conceito_delete',
            ],
            [
                'id'    => 115,
                'title' => 'conceito_access',
            ],
            [
                'id'    => 116,
                'title' => 'banco_create',
            ],
            [
                'id'    => 117,
                'title' => 'banco_edit',
            ],
            [
                'id'    => 118,
                'title' => 'banco_show',
            ],
            [
                'id'    => 119,
                'title' => 'banco_delete',
            ],
            [
                'id'    => 120,
                'title' => 'banco_access',
            ],
            [
                'id'    => 121,
                'title' => 'boleto_create',
            ],
            [
                'id'    => 122,
                'title' => 'boleto_edit',
            ],
            [
                'id'    => 123,
                'title' => 'boleto_show',
            ],
            [
                'id'    => 124,
                'title' => 'boleto_delete',
            ],
            [
                'id'    => 125,
                'title' => 'boleto_access',
            ],
            [
                'id'    => 126,
                'title' => 'remessa_create',
            ],
            [
                'id'    => 127,
                'title' => 'remessa_edit',
            ],
            [
                'id'    => 128,
                'title' => 'remessa_show',
            ],
            [
                'id'    => 129,
                'title' => 'remessa_delete',
            ],
            [
                'id'    => 130,
                'title' => 'remessa_access',
            ],
            [
                'id'    => 131,
                'title' => 'responsavei_create',
            ],
            [
                'id'    => 132,
                'title' => 'responsavei_edit',
            ],
            [
                'id'    => 133,
                'title' => 'responsavei_show',
            ],
            [
                'id'    => 134,
                'title' => 'responsavei_delete',
            ],
            [
                'id'    => 135,
                'title' => 'responsavei_access',
            ],
            [
                'id'    => 136,
                'title' => 'series_create',
            ],
            [
                'id'    => 137,
                'title' => 'series_edit',
            ],
            [
                'id'    => 138,
                'title' => 'series_show',
            ],
            [
                'id'    => 139,
                'title' => 'series_delete',
            ],
            [
                'id'    => 140,
                'title' => 'series_access',
            ],
            [
                'id'    => 141,
                'title' => 'disciplina_create',
            ],
            [
                'id'    => 142,
                'title' => 'disciplina_edit',
            ],
            [
                'id'    => 143,
                'title' => 'disciplina_show',
            ],
            [
                'id'    => 144,
                'title' => 'disciplina_delete',
            ],
            [
                'id'    => 145,
                'title' => 'disciplina_access',
            ],
            [
                'id'    => 146,
                'title' => 'seriedisciplina_create',
            ],
            [
                'id'    => 147,
                'title' => 'seriedisciplina_edit',
            ],
            [
                'id'    => 148,
                'title' => 'seriedisciplina_show',
            ],
            [
                'id'    => 149,
                'title' => 'seriedisciplina_delete',
            ],
            [
                'id'    => 150,
                'title' => 'seriedisciplina_access',
            ],
            [
                'id'    => 151,
                'title' => 'turmaprofessordisciplina_create',
            ],
            [
                'id'    => 152,
                'title' => 'turmaprofessordisciplina_edit',
            ],
            [
                'id'    => 153,
                'title' => 'turmaprofessordisciplina_show',
            ],
            [
                'id'    => 154,
                'title' => 'turmaprofessordisciplina_delete',
            ],
            [
                'id'    => 155,
                'title' => 'turmaprofessordisciplina_access',
            ],
            [
                'id'    => 156,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
