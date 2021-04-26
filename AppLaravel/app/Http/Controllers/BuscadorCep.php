<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cep_table;
use DB;

class BuscadorCep extends Controller
{
    public function getHome(){
        return view('getHome');
    }
    
    public function BuscadorCep(Request $request) {
        // Recuperando os dados do formulário
        $cepNumber = strval($request->cep);

        // 1º Verificação: Procura no banco de dados se o cep já está cadastrado
        $cepDB = Cep_table::where('cep','=', $cepNumber)->get();
        foreach($cepDB as $key => $value){
            $data2 = $value;
        }
        
        // 2º Verificação: Se a variavel $data2 estiver vazia irá fazer a requisição
        if(empty($data2)){
            // Fazendo a requisição para API
            $url = "http://viacep.com.br/ws/$cepNumber/xml/";
            $data = simplexml_load_file($url);

            // Verifica o retorno da requisição. Se o xml possui o campo CEP com valores dentro significa que o 
            // cep é válido caso contrário retorna Null, logo entende-se que o cep é inválido.
            if($data->cep){
                // Inserindo dados no banco Mysql.
                DB::insert('insert into Cep_table (cep, logradouro, bairro, localidade, uf) values (?, ?, ?, ?, ?)', array($cepNumber, $data->logradouro, $data->bairro, $data->localidade, $data->uf));

                //Retornando o XML para a view.
                return view('getAddress', compact('data'));
            }else {
                // Se o cep for inválido, é redirecionado para a página principal com uma mensagem de erro.
                return redirect()->route('home')->withErrors(['CEP inválido! Entre com um cep válido']);
            }
        }

        // Caso já exista o registro do cep, irá pegar direto do Banco de Dados sem fazer uma requisição para API.
        // Para economizar código, $data = $data2, logo no html posso pegar as info do banco ou da requisição e preencher os campos da tabela
        // sem precisar usar uma variável para os dados do banco e outra variável para os dados vindo da requisição
        $data = $data2;
        return view('getAddress', compact('data'));  
    }
}
