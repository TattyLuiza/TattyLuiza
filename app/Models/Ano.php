<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ano extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'anos';

    protected $dates = [
        'ano',
        'datai_1',
        'dataf_1',
        'datai_2',
        'dataf_2',
        'datai_3',
        'dataf_3',
        'datai_4',
        'dataf_4',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ano',
        'logomarca',
        'escola',
        'cnpj',
        'portaria_1',
        'portaria_2',
        'portaria_3',
        'portaria_4',
        'portaria_5',
        'portaria_6',
        'rua',
        'bairro',
        'cep',
        'telefones',
        'cidade',
        'email',
        'url',
        'boletim',
        'falta',
        'bim_1',
        'bim_2',
        'bim_3',
        'bim_4',
        'valor_1',
        'desc_1',
        'valor_2',
        'desc_2',
        'valor_3',
        'desc_3',
        'valor_4',
        'desc_4',
        'valor_5',
        'desc_5',
        'prof_recado',
        'prof_tarefa',
        'datai_1',
        'dataf_1',
        'datai_2',
        'dataf_2',
        'datai_3',
        'dataf_3',
        'datai_4',
        'dataf_4',
        'diapgto',
        'mora_1',
        'multa_1',
        'instrucao_1',
        'mora_2',
        'multa_2',
        'instrucao_2',
        'mora_3',
        'multa_3',
        'instrucao_3',
        'mora_4',
        'multa_4',
        'instrucao_4',
        'dia_vencimento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function anoMatriculas()
    {
        return $this->hasMany(Matricula::class, 'ano_id', 'id');
    }

    public function getAnoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAnoAttribute($value)
    {
        $this->attributes['ano'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDatai1Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatai1Attribute($value)
    {
        $this->attributes['datai_1'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataf1Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataf1Attribute($value)
    {
        $this->attributes['dataf_1'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDatai2Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatai2Attribute($value)
    {
        $this->attributes['datai_2'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataf2Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataf2Attribute($value)
    {
        $this->attributes['dataf_2'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDatai3Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatai3Attribute($value)
    {
        $this->attributes['datai_3'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataf3Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataf3Attribute($value)
    {
        $this->attributes['dataf_3'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDatai4Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatai4Attribute($value)
    {
        $this->attributes['datai_4'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataf4Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataf4Attribute($value)
    {
        $this->attributes['dataf_4'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
