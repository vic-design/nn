<?php


namespace App\Neural;


class Synapse
{
    protected $input;
    protected $output;
    protected $weight;

    /**
     * Synapse constructor.
     * @param Neuron $input
     * @param Neuron $output
     * @param int $value
     */
    public function __construct(Neuron $input, Neuron $output, $value = 0) {
        $this->input = $input;
        $this->output = $output;
        $this->setWeight($value);
    }

    /**
     * Synapse weight setter
     * @param $value
     */
    public function setWeight($value) {
        $this->weight = $value;
    }

    /**
     * Synapse weight getter
     * @return float
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * Synapse input neuron getter
     * @return Neuron
     */
    public function getInput() {
        return $this->input;
    }

    /**
     * Synapse output neuron getter
     * @return Neuron
     */
    public function getOutput() {
        return $this->output;
    }
}