<?php

namespace App\Neural;


use App\NeuralNetwork;
use \Illuminate\Support\Collection;

class Network
{
    public $inputs = [];
    public $inputKeys = 0;
    public $layers = [];
    public $layerKeys = 0;
    public $outputs = [];
    public $outputKeys = 0;

    public function __construct(NeuralNetwork $neuralNetwork) {
        $this->setInputs($neuralNetwork->getInputs());
        dd($this);
    }

    public function setInputs(Collection $inputs) {
        foreach ($inputs as $input) {
            $this->inputs[$this->inputKeys] = new InputNeuron($this->inputKeys);
            $this->inputKeys++;
        }
    }

    public function setHiddenLayers(Collection $layers) {
        foreach ($layers as $layer) {
            $this->layers[$this->layerKeys] = null; //TODO add Layer class
            $this->layerKeys++;
        }
    }

    public function setOutputs(Collection $outputs) {
        foreach ($outputs as $output) {
            $this->outputs[$this->outputKeys] = null; //TODO add output class
            $this->outputKeys++;
        }
    }
}