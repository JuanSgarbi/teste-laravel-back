<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\People;
use App\Http\Resources\People as PeopleResource;
use SplFileObject;

class PeopleController extends Controller
{
   
    public function index()
    {
        return People::all();
    }

    
    public function store(Request $request)
    {
        if ($request->hasFile('file')) 
        {
            $arquivo = $request->file('file');
            $caminho = $arquivo->getRealPath();

            $file = new SplFileObject($caminho, 'r');
            $file->setFlags(SplFileObject::READ_CSV);

            foreach ($file as $linha) 
            {   
                if($linha[0] !== 'nome' && $linha[0] !== null)
                {
                    $pessoa = new People;
                    $pessoa->nome = $linha[0];
                    $pessoa->idade = $linha[1];
                    $pessoa->cpf = $linha[2];
                    $pessoa->rg = $linha[3];
                    $pessoa->data_nasc = $linha[4];
                    $pessoa->sexo = $linha[5];
                    $pessoa->signo = $linha[6];
                    $pessoa->mae = $linha[7];
                    $pessoa->pai = $linha[8];
                    $pessoa->email = $linha[9];
                    $pessoa->senha = $linha[10];
                    $pessoa->cep = $linha[11];
                    $pessoa->endereco = $linha[12];
                    $pessoa->numero = $linha[13];
                    $pessoa->bairro = $linha[14];
                    $pessoa->cidade = $linha[15];
                    $pessoa->estado = $linha[16];
                    $pessoa->telefone_fixo = $linha[17];
                    $pessoa->celular = $linha[18];
                    $pessoa->altura = $linha[19];
                    $pessoa->peso = $linha[20];
                    $pessoa->tipo_sanguineo = $linha[21];
                    $pessoa->cor = $linha[22];
                    $pessoa->save();
                }
                }
        }
        return "Pessoas cadastradas com sucesso!";
    }
}
