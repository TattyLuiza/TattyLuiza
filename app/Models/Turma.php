<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Turma extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'turmas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'serie_id',
        'banco_id',
        'ano_id',
        'tipo',
        'nome',
        'sala',
        'turno',
        'valor',
        'obs',
        'letivos',
        'carga_horaria',
        'falta',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function turmaMatriculas()
    {
        return $this->hasMany(Matricula::class, 'turma_id', 'id');
    }

    public function turmaPlanosAulas()
    {
        return $this->hasMany(PlanosAula::class, 'turma_id', 'id');
    }

    public function turmaHorarioSemanals()
    {
        return $this->hasMany(HorarioSemanal::class, 'turma_id', 'id');
    }

    public function serie()
    {
        return $this->belongsTo(Series::class, 'serie_id');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'banco_id');
    }

    public function ano()
    {
        return $this->belongsTo(Ano::class, 'ano_id');
    }
}
