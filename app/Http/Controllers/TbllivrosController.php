<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Http\RedirectResponse;
use illuminate\Http\Response;
use illuminate\Support\Facades\Validator;
use App\Models\tbllivros;
class TbllivrosController extends Controller
{
    //construir o crud
    //mostrar todos os registros da tabeka livros
    //crud -> Read(leitura) select/ visualizar
    public function index() {
        $regBook = tbllivros::ALL();
        $contador = $regBook ->count();
        return 'Livros: '.$contador.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);


    }
    //cadastrar registro
    //Crud -> Create(criar/cadastrar)
    public function show (string $id){
        $regBook= tbllivros::find($id);
        if($regBook){
            return 'Livros localizados '.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Livros localizados '.$regBook.Response()->json([],Response::HTTP_NO_CONTENT);
        }

    }
    //Alterar registro
    //Crud -> update(alterar)
    public function store(Request $request){
        $regBook=$request->ALL();
        
        $regVerifq = Validator::make($regBook,[
            'nomeLivro'=>'required',
            'generoLivro'=>'required',
            'anoLivro'=>'required'
            
        ]);
        if($regVerifq->fails()){
            return 'Registros Invalidos '.Response()->json([],Response::HTTP_NO_CONTENT);;
        }   
        $regBookCad = tbllivros::create($regBook);
        if($regBookCad){
            return 'Livros cadastrados '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        else{
            'Registros Invalidos '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }
    //Deletar os registros
    //Crud -> delete(apagar)
    public function destroy (){

    }
}
