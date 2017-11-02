<?php

namespace App\Neural;


use Illuminate\Database\Eloquent\Collection;

class Neuron
{
    public $id;
    public $value;
    public $synapses = [];
    public $synapseKey = 0;

    public function __construct($id) {
        $this->id = $id;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setSynapses(Collection $synapses) {
        foreach ($synapses as $synapse) {
            $this->synapses[$this->synapseKey] = null; //TODO add synapse class
        }
    }
}