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

class Professor extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'professors';

    protected $appends = [
        'foto',
    ];

    protected $hidden = [
        'senha',
    ];

    public const SEXO_SELECT = [
        'feminino'  => 'Feminino',
        'masculino' => 'Masculino',
    ];

    protected $dates = [
        'admissao',
        'nascimento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'user_id',
        'senha',
        'cargo',
        'banco',
        'pis',
        'ctps',
        'admissao',
        'cpf',
        'rg',
        'nome',
        'nascimento',
        'naturalidade',
        'sexo',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'telefone',
        'celular',
        'email',
        'obs',
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

    public function professorHorarioSemanals()
    {
        return $this->hasMany(HorarioSemanal::class, 'professor_id', 'id');
    }

    public function professorDiarios()
    {
        return $this->hasMany(Diario::class, 'professor_id', 'id');
    }

    public function getFotoAttribute()
    {
        $file = $this->getMedia('foto')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAdmissaoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAdmissaoAttribute($value)
    {
        $this->attributes['admissao'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getNascimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setNascimentoAttribute($value)
    {
        $this->attributes['nascimento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
