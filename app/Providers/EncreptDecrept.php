<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Vinkla\Hashids\Facades\Hashids;
use Hashids\Hashids;

class EncreptDecrept extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    // refarance link https://github.com/vinkla/hashids
    public function encrept($id){
        $hashids = new Hashids('', 10);

        return $hashids->encode($id);
       // return Hashids::encode($id);
        
    }

    public function decrept($id){
        $hashids = new Hashids('', 10);

        return $hashids->decode($id);
    }
}
