<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use App\LogAcesso;


class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "ip $ip requisitou a rota $rota"]);

        //return $next($request); // faz a rota seguir
        $resposta = $next($request);
        
        $resposta->setStatusCode(201,'O status da resposta e o texto da resposta foram modificados!!!!!!!!!!!');
        

        return $resposta;
    }
}
