<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    //use Illuminate\Support\Facades\Schema;
 
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       /*
        Schema::table('board_file', function (Blueprint $table) {
            $table->foreignId('boardId')->constrained('board')->onDelete('cascade');
        });

        Schema::table('reply', function (Blueprint $table) {
            $table->foreignId('pid')->constrained('board')->onDelete('cascade');
        });

       */ 
    }
}
