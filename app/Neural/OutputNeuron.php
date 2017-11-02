<?php

namespace App\Neural;


use Illuminate\Database\Eloquent\Collection;

class OutputNeuron extends Neuron
{
    public $id;
    public $value;
    public $synapses = [];
    public $synapseKey = 0;

    public function setSynapses(Collection $synapses) {
        foreach ($synapses as $synapse) {
            $this->synapses[$this->synapseKey] = null; //TODO add synapse class
        }
    }
}