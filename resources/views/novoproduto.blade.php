@extends('layout.app', ['current' => 'produto'])

@section('body')

   <div class="card border">
        <div class="card-body">
            <form action="/produtos" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select class="form-control" name="categoria_id" id="categoria_id">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="estoque">Quantidade</label>
                    <input type="number" class="form-control" name="estoque" id="estoque" placeholder="Estoque">
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
   </div>
    
@endsection