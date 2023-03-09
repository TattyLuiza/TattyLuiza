<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matricula extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'matriculas';

    protected $dates = [
        'data_transferencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ano_id',
        'status',
        'aluno_id',
        'aluno_nome',
        'mae_id',
        'mae_nome',
        'pai_id',
        'pai_nome',
        'turno',
        'turma_id',
        'turma_nome',
        'valor',
        'desconto',
        'total',
        'conceito_1',
        'conceito_2',
        'conceito_3',
        'conceito_4',
        'conceitofinal',
        'obs',
        'falta_1',
        'falta_2',
        'falta_3',
        'falta_4',
        'faltaf',
        'data_transferencia',
        'obs_transferencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function matriculaDiariosAlunos()
    {
        return $this->hasMany(DiariosAluno::class, 'matricula_id', 'id');
    }

    public function ano()
    {
        return $this->belongsTo(Ano::class, 'ano_id');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    public function mae()
    {
        return $this->belongsTo(Responsavei::class, 'mae_id');
    }

    public function pai()
    {
        return $this->belongsTo(Responsavei::class, 'pai_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function getDataTransferenciaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataTransferenciaAttribute($value)
    {
        $this->attributes['data_transferencia'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
