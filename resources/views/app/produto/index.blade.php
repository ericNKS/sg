@extends('app.layouts.basico') <!-- Pega o layout -->
@section('titulo', 'Produto')
    
@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de produtos</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{route('produto.create')}}">Novo</a>
            </li>
            <li>
                <a href="">Consulta</a>
            </li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <div class="informacao-pagina">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>
                                    {{$produto->nome}}
                                </td>
                                <td>
                                    {{$produto->descricao}}
                                </td>
                                <td>
                                    {{$produto->peso}}
                                </td>
                                <td>
                                    {{$produto->unidade_id}}
                                </td>
                                <td>
                                    <a class="delete" href="">Excluir</a>
                                </td>
                                <td>
                                    <a href="">Editar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$produtos->appends($request)->links()}}
                Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
            </div>
        </div>
    </div>
</div>
@endsection