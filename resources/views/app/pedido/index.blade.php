@extends('app.layouts.basico') <!-- Pega o layout -->
@section('titulo', 'Super Gestão - Pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Pedido</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{route('pedido.create')}}">Novo</a>
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
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>
                                    {{$pedido->id}}
                                </td>
                                <td>
                                    {{$pedido->cliente_id}}
                                </td>
                                <td>
                                    <a href="{{route('pedido-produto.create', ['pedido'=>$pedido->id])}}">Adicionar Produtos</a>
                                </td>
                                <td>
                                    <a class="" href="{{route('pedido.show', ['pedido' => $pedido->id])}}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$pedido->id}}" action="{{route('pedido.destroy', ['pedido'=>$pedido->id])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()" class="delete" >Excluir</a>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('pedido.edit', ['pedido' => $pedido->id])}}">Editar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$pedidos->appends($request)->links()}}
                Exibindo {{$pedidos->count()}} produtos de {{$pedidos->total()}} (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})
            </div>
        </div>
    </div>
</div>
@endsection
