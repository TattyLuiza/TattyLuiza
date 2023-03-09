<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavei extends Model
{
    use HasFactory;

    public $table = 'responsaveis';

    protected $hidden = [
        'senha',
    ];

    public const SEXO_SELECT = [
        'f' => 'Feminino',
        'm' => 'Masculino',
    ];

    protected $dates = [
        'nascimento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'rg',
        'cpf',
        'nascimento',
        'rua',
        'complemento',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'nacionalidade',
        'telefone',
        'celular',
        'email',
        'senha',
        'instrucao',
        'profissao',
        'trabalho',
        'fonetrabalho',
        'sexo',
        'obs',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function financeiroAlunos()
    {
        return $this->hasMany(Aluno::class, 'financeiro_id', 'id');
    }

    public function maeAlunos()
    {
        return $this->hasMany(Aluno::class, 'mae_id', 'id');
    }

    public function paiAlunos()
    {
        return $this->hasMany(Aluno::class, 'pai_id', 'id');
    }

    public function maeMatriculas()
    {
        return $this->hasMany(Matricula::class, 'mae_id', 'id');
    }

    public function paiMatriculas()
    {
        return $this->hasMany(Matricula::class, 'pai_id', 'id');
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
