<?php


namespace App\Observers;


use App\NeuralNetwork;
use App\Neuron;

class NeuralNetworkObserver
{

    public function created(NeuralNetwork $neuralNetwork) {

        //create neurons
        for($i = 0; $i < $neuralNetwork->inputs; $i++) {
            Neuron::create([
                'type' => 'input',
                'nn_id' => $neuralNetwork->id
            ]);

            for($j = 0; $j < $neuralNetwork->layers; $j++) {
                Neuron::create([
                    'type' => 'hidden',
                    'nn_id' => $neuralNetwork->id,
                    'layer_num' => $j
                ]);
            }
        }

        for($i = 0; $i < $neuralNetwork->outputs; $i++) {
            Neuron::create([
                'type' => 'output',
                'nn_id' => $neuralNetwork->id
            ]);
        }
    }

}