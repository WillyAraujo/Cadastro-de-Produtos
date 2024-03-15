<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prods = Produto::all();
        return view('produtos', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('novoproduto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prod = new Produto();
        $prod->nome = $request->input('nomeProduto');
        $prod->estoque = $request->input('estoque');
        $prod->preco = $request->input('preco');
        $prod->categoria_id = $request->input('categoria_id'); // Salva o ID da categoria do produto
        $prod->save();
        return redirect('/produtos');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prod = Produto::find($id);
        if ($prod !== null) {
            return view('editarproduto', compact('prod'));
        }
        return redirect('/produtos');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prod = Produto::find($id);
        if ($prod !== null) {
            $prod->nome = $request->input('nomeProduto');
            $prod->save();
        }
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prod = Produto::find($id);
        if ($prod !== null) {
            $prod->delete();
        }
        return redirect('/produtos');
    }
}
