<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boletin extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'boletins';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'aluno_id',
        'matricula_id',
        'professor_id',
        'turma_id',
        'disciplina_id',
        't_1',
        'n_1',
        'f_1',
        't_2',
        'n_2',
        'f_2',
        't_3',
        'n_3',
        'f_3',
        't_4',
        'n_4',
        'f_4',
        'r_1',
        'r_2',
        'r_3',
        'r_4',
        'tr',
        'tr_nota',
        't_falta',
        'recuperacao',
        'resultado',
        'aluno_nome',
        'turma_nome',
        'materia_nome',
        'abreviado_nome',
        'professor_nome',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'matricula_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }
}
