<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Synapse
 * @package App
 * @property integer $id
 * @property integer $neuron_id
 * @property float $weight
 * @property Neuron $neuron
 */
class Synapse extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['neuron_id', 'weight'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function neuron() {
        return $this->belongsTo(Neuron::class, 'neuron_id');
    }
}
