<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turmaprofessordisciplina extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'turmaprofessordisciplinas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'turma_id',
        'professor_id',
        'disciplina_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }
}
