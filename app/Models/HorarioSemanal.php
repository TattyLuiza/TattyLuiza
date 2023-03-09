<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioSemanal extends Model
{
    use HasFactory;

    public $table = 'horario_semanals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ano_id',
        'turma_id',
        'professor_id',
        'horario_id',
        'disciplina_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function ano()
    {
        return $this->belongsTo(Ano::class, 'ano_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }
}
