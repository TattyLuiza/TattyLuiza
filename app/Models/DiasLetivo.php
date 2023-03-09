<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasLetivo extends Model
{
    use HasFactory;

    public $table = 'dias_letivos';

    protected $dates = [
        'data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'data',
        'ano_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function diaLetivoPlanosAulas()
    {
        return $this->hasMany(PlanosAula::class, 'dia_letivo_id', 'id');
    }

    public function diaLetivoDiarios()
    {
        return $this->hasMany(Diario::class, 'dia_letivo_id', 'id');
    }

    public function getDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function ano()
    {
        return $this->belongsTo(Ano::class, 'ano_id');
    }
}
