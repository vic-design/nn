<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Neuron
 * @package App
 * @property integer $id
 * @property string $type
 * @property integer $nn_id
 * @property integer $layer_num
 * @property Synapse $synapses
 * @property NeuralNetwork $network
 */
class Neuron extends Model {
    //

    public $timestamps = false;
    protected $fillable = ['type', 'nn_id', 'layer_num'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function synapses() {
        return $this->hasMany(Synapse::class, 'neuron_id');
    }

    public function network() {
        return $this->belongsTo(NeuralNetwork::class, 'nn_id');
    }
}
