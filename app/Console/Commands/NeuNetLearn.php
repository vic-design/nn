<?php

namespace App\Console\Commands;

use App\Neural;
use App\NeuralNetwork;
use Illuminate\Console\Command;

class NeuNetLearn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nn:learn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run network learning';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $nn = new Neural\Network(NeuralNetwork::find(1));
        dd(123);
        /**
         * входные значения
         */
        $I = [1, 0];
        /**
         * веса синапсов
         */
        $w = [0.45, 0.78, -0.12, 0.13, 1.5, -2.3];
        $w = [1, 1, 1, 1, 1, 1];
        /**
         * входные значения скрытых нейронов
         */
        $error = 1;
        $count = 0;

        $start = microtime(true);
        while($error > 0.0001) {
            print $count."\n";
            $result = Neural::learn($w, $I);
            $w = $result['weights'];
            $error = $result['output']['error'];
            $count++;
        }
        $time = microtime(true) - $start;
        dd($time);
    }


}
