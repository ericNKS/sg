@if (isset($cliente->id))
                <form action="{{route('cliente.update', ['cliente' => $cliente->id])}}" method="post">
                    @method('PUT')
                    @csrf
            @else
                <form action="{{ route('cliente.store') }}" method="post">
                    @csrf
            @endif

                <input type="text" name="nome" value="{{$cliente->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta" id="">
                {{ $errors->has('nome')? $errors->first('nome') : '' }}

                @if (isset($cliente->id))
                    <button type="submit" class="borda-preta">Editar</button>
                @else
                    <button type="submit" class="borda-preta">Cadastrar</button>
                @endif
            </form>
