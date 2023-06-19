<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [ 
        'nome', 
        'idade', 
        'cpf', 
        'rg', 
        'data_nasc', 
        'sexo', 
        'signo', 
        'mae', 
        'pai', 
        'email', 
        'senha', 
        'cep', 
        'endereco', 
        'numero', 
        'bairro', 
        'cidade', 
        'estado', 
        'telefone_fixo', 
        'celular', 
        'altura', 
        'peso', 
        'tipo_sanguineo', 
        'cor',
    ];
}

