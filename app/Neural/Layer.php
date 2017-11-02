<?php

namespace App\Neural;


use Illuminate\Database\Eloquent\Collection;

class Layer
{
    public $id;
    public $neurons = [];
    public $neuronKey = 0;

    public function __construct($id) {
        $this->id = $id;
    }

    public function setNeurons(Collection $neurons) {
        foreach ($neurons as $neuron) {
            $this->neurons[$this->neuronKey] = new Neuron($this->neuronKey);
            $this->neuronKey++;
        }
    }
}