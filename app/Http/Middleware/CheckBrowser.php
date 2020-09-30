<?php

namespace App\Http\Middleware;

use Closure;

class CheckBrowser
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
        /**
         * No utilize https://github.com/jenssegers/agent/blob/master/src/Agent.php
         * ya que el requerimiento es muy sencillo y no vi la necesidad,
         * ademas jenssegers/agent utiliza un regex que es menos eficiente que un strpos o strstr
         * MSIE es valido para MSIE y para MSIEMobile
         * Tambien podriamos guardar en cache el resultado para no hacer el regex en cada peticion
         */
        $agent = $request->header('User-Agent');

        if(strpos($agent, 'MSIE') !== false){
            return redirect('https://browsehappy.com/');
        }

        return $next($request);
    }
}
