<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RecadosTarefasAluno extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'recados_tarefas_alunos';

    protected $dates = [
        'agendamento',
        'lida_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_recado_tarefa_professor_id',
        'id_professor_id',
        'titulo',
        'texto',
        'arquivo',
        'tipo',
        'modo',
        'leu',
        'agendamento',
        'lida_at',
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

    public function id_recado_tarefa_professor()
    {
        return $this->belongsTo(Aluno::class, 'id_recado_tarefa_professor_id');
    }

    public function id_professor()
    {
        return $this->belongsTo(Aluno::class, 'id_professor_id');
    }

    public function id_alunos()
    {
        return $this->belongsToMany(Aluno::class);
    }

    public function getAgendamentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAgendamentoAttribute($value)
    {
        $this->attributes['agendamento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLidaAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLidaAtAttribute($value)
    {
        $this->attributes['lida_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
