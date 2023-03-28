<h3>FOrnecedor</h3>


{{-- Fica o comentario --}}

@php
    // para comentario de uma linha 
    /*
        para comentario de multiplas linhas
    
    if(){

    }
    elseif(){

    }else{

    }
    */
@endphp

{{--
@if(count($fornecedor) > 0 && count($fornecedor) < 10)
    <h3> Existem alguns fornecedores cadastrados </h3>
@elseif(count($fornecedor) > 10)
<h3> Existem varios fornecedores cadastrados </h3>
@else
<h3> Ainda não existem fornecedores cadastrados </h3>
@endif
--}}

@isset($fornecedor) <!-- So vai entrar nesse bloco se $fornecedor estiver definido -->

    @for($i = 0; isset($fornecedor[$i]); $i++)
        Fornecedor:  {{$fornecedor[$i]['nome']}}
        <br>
        Status: {{$fornecedor[$i]['status']}}
        <br>
        CNPJ: {{$fornecedor[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{$fornecedor[$i]['ddd'] ?? 'Dado não foi preenchido' }}) {{$fornecedor[$i]['telefone'] ?? 'Dado não foi preenchido' }}
        <hr>
    @endfor

@endisset