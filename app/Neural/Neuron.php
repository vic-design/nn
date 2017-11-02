<?php
/**
 * Created by PhpStorm.
 * User: progforce
 * Date: 02.11.17
 * Time: 10:56
 */

namespace App\Neural;


class Neuron
{
    public $id;
    public $value;

    public function __construct($id) {
        $this->id = $id;
    }

    public function setValue($value) {
        $this->value = $value;
    }
}