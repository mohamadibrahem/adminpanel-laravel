<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PublicComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeCatygorie();
    }
	
	public function composeCatygorie()
	{
		view()->composer('*','App\Http\Composers\PublicComposer');
	}
}



