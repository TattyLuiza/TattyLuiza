<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'emails';

    protected $dates = [
        'inicio',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'texto',
        'inicio',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getInicioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInicioAttribute($value)
    {
        $this->attributes['inicio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
