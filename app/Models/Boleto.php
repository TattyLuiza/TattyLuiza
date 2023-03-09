<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boleto extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'boletos';

    protected $dates = [
        'datadesconto',
        'vencimento',
        'data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'banco_id',
        'matricula_id',
        'turma_id',
        'movimento',
        'descricao',
        'parcela',
        'valor',
        'recebido',
        'datadesconto',
        'valordesconto',
        'instrucoes',
        'status',
        'tipo',
        'mora',
        'multa',
        'vencimento',
        'data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'banco_id');
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'matricula_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function getDatadescontoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatadescontoAttribute($value)
    {
        $this->attributes['datadesconto'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getVencimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVencimentoAttribute($value)
    {
        $this->attributes['vencimento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
