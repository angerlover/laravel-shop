<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\model\admin\LaravelGoods;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
        LaravelGoods::saving(function ($data)
        {
            $data['addtime'] = date('Y-m-d H:i:s',time());
            $data['is_on_sale'] = '是';
            // dd($data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
