<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    public $table = 'horarios';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ano_id',
        'nome',
        'ini',
        'fim',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function horarioHorarioSemanals()
    {
        return $this->hasMany(HorarioSemanal::class, 'horario_id', 'id');
    }

    public function horarioDiarios()
    {
        return $this->hasMany(Diario::class, 'horario_id', 'id');
    }

    public function ano()
    {
        return $this->belongsTo(Ano::class, 'ano_id');
    }
}
