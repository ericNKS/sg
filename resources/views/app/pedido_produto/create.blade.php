@extends('app.layouts.basico') <!-- Pega o layout -->
@section('titulo', 'Super Gestão - Pedido Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao pedido</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{route('pedido.index')}}">Voltar</a>
            </li>
            <li>
                <a href="">Consulta</a>
            </li>
        </ul>
    </div>
    <div class="informacao-pagina">

        <h4> Detalhes do pedido </h4>
        <p>ID do pedido: {{$pedido->id}} </p>
        <p>Cliente: {{$pedido->cliente_id}} </p>

        <div style="width: 30%; margin-left: auto; margin-right: auto;">

            <h4>Itens do Pedido</h4>

            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Data de inclusao do pedido</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td> {{$produto->id}} </td>
                            <td> {{$produto->nome}} </td>
                            <td>{{$produto->pivot->created_at->format('d/m/Y')}}</td>
                            <td>
                                <form action="{{route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id])}}" id="form_{{$pedido->id}}_{{$produto->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()" class="delete">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>
</div>
@endsection
