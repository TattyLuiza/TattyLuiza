<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Aluno extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'alunos';

    protected $appends = [
        'foto',
    ];

    protected $hidden = [
        'senha',
    ];

    public const STATUS_SELECT = [
        '1' => 'Sim',
        '2' => 'Não',
    ];

    public const SEXO_SELECT = [
        'f' => 'Feminino',
        'm' => 'Masculino',
    ];

    protected $dates = [
        'nascimento',
        'acesso',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'nome',
        'sexo',
        'nascimento',
        'cpf',
        'rg',
        'nacionalidade',
        'naturalidade',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'mae_id',
        'pai_id',
        'financeiro_id',
        'telefone',
        'acesso',
        'email',
        'senha',
        'categoria',
        'frequentar',
        'busca',
        'busca_1',
        'busca_2',
        'busca_3',
        'busca_4',
        'parentesco_1',
        'parentesco_2',
        'parentesco_3',
        'parentesco_4',
        'desc_1',
        'desc_2',
        'desc_3',
        'desc_4',
        'desc_5',
        'diavencimento',
        'alergia',
        'convulsao',
        'pronto_socorro',
        'remedio',
        'fala',
        'audicao',
        'febre',
        'convenio',
        'recomendacao',
        'natacao',
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

    public function alunoMatriculas()
    {
        return $this->hasMany(Matricula::class, 'aluno_id', 'id');
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

    public function getNascimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setNascimentoAttribute($value)
    {
        $this->attributes['nascimento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function mae()
    {
        return $this->belongsTo(Responsavei::class, 'mae_id');
    }

    public function pai()
    {
        return $this->belongsTo(Responsavei::class, 'pai_id');
    }

    public function financeiro()
    {
        return $this->belongsTo(Responsavei::class, 'financeiro_id');
    }

    public function getAcessoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setAcessoAttribute($value)
    {
        $this->attributes['acesso'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
