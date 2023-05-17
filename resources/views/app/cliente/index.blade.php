@extends('app.layouts.basico') <!-- Pega o layout -->
@section('titulo', 'Super Gestão - Clinte')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Clientes</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{route('cliente.create')}}">Novo</a>
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
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>
                                    {{$cliente->nome}}
                                </td>
                                <td>
                                    <a class="" href="{{route('cliente.show', ['cliente' => $cliente->id])}}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', ['cliente'=>$cliente->id])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()" class="delete" >Excluir</a>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('cliente.edit', ['cliente' => $cliente->id])}}">Editar </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$clientes->appends($request)->links()}}
                Exibindo {{$clientes->count()}} produtos de {{$clientes->total()}} (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}})
            </div>
        </div>
    </div>
</div>
@endsection
