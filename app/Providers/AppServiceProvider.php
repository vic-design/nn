<?php

namespace App\Providers;

use App\NeuralNetwork;
use App\Neuron;
use App\Observers\NeuralNetworkObserver;
use App\Observers\NeuronObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        // observers
        NeuralNetwork::observe(NeuralNetworkObserver::class);
        Neuron::observe(NeuronObserver::class);
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
