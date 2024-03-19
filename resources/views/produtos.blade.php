@extends('layout.app', ["current" => "produtos"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>

            @if (count($prods) > 0)

            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prods as $prod)
                        <tr>
                            <td>{{ $prod->id }}</td>
                            <td>{{ $prod->nome }}</td>
                            <td>{{ $prod->estoque }}</td>
                            <td> {{ $prod->preco }}</td>
                            <td>
                                <a href="/produtos/editar/{{$prod->id}}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/produtos/apagar/{{$prod->id}}" class="btn btn-sm btn-danger">Apagar</a>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="card-footer">
            <button class="btn btn-primary btn-sm" role="button" onclick="novoProduto()">Novo Produto</button>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto" action="/produtos" method="POST">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto">Nome do Produto</label>
                            <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                        </div>

                        <div class="form-group">
                            <label for="categoriaProduto" class="control-label">Categoria</label>
                            <div class="input-group">
                                <select class="form-control" id="categoriaProduto">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estoque">Quantidade</label>
                            <input type="number" class="form-control" name="estoque" id="estoque" placeholder="Estoque">
                        </div>

                        <div class="form-group">
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        function novoProduto() {
        $('#id').val('');
        $('#nomeProduto').val('');
        $('#preco').val('');
        $('#estoque').val('');
        $('#categoria_id').val($('#categoriaProduto').val());
        $('#dlgProdutos').modal('show');
        }

        $('#btnCancelar').click(function() {
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#preco').val('');
            $('#estoque').val('');
            $('#categoria_id').val('');
            $('#dlgProdutos').modal('hide');
        });

        function carregarCategorias() {
            $.getJSON('/api/categorias', function(data) {
                $('#categoriaProduto').empty();
                for(i=0; i<data.length; i++) {
                    opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    $('#categoriaProduto').append(opcao);
                }
            });
        }
        $(function() {
            carregarCategorias();
        })
    </script>

@endsection