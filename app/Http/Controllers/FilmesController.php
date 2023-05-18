<?php

namespace App\Http\Controllers;

use App\Models\Filmes;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FilmesController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
        ->meusFilmes()
        ->create([
            'titulo'=>$request ->titulo,
            'diretor' => $request ->diretor, 
            'genero'=>$request ->genero,
            'ano'=>$request ->ano,
            'classificacao'=>$request ->classificacao 
        ]);
        return redirect (route('dashboard'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filmes  $filme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filmes $filme)
    {
        $filme->titulo = $request->titulo;
        $filme->diretor = $request->diretor;
        $filme->genero = $request->genero;
        $filme->ano = $request->ano;
        $filme->classificacao = $request->classificacao;
        $filme->save();

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filmes  $filme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filmes $filme)
    {
        $filme->delete();
        return redirect('dashboard');
    }
}
