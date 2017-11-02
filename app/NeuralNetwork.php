<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NeuralNetwork
 * @package App
 * @property integer $id
 * @property string $name
 * @property integer $inputs
 * @property integer $layers
 * @property integer $outputs
 * @property Neuron $neurons
 */
class NeuralNetwork extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['name', 'inputs', 'layers', 'outputs'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function neurons() {
        return $this->hasMany(Neuron::class, 'nn_id');
    }

    public function getInputs() {
        return $this->neurons->where('type', 'input');
    }
}
