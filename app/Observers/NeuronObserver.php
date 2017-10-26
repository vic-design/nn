<?php

namespace App\Observers;


use App\Neuron;
use App\Synapse;

class NeuronObserver
{
    public function created(Neuron $neuron) {
        if($neuron->type != 'input') {
            for($i = 0; $i < $neuron->network->inputs; $i++) {
                Synapse::create([
                    'neuron_id' => $neuron->id,
                    'weight' => rand(-5,5)/5,
                ]);
            }
        }
    }
}