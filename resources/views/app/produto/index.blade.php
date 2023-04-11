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
                <table border="1" width="100%" style="margin-top: 50px">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
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
                                    <a class="" href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto'=>$produto->id])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()" class="delete" >Excluir</a>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar </a>
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
