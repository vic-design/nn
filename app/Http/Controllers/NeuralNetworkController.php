<?php

namespace App\Http\Controllers;

use App\NeuralNetwork;
use Illuminate\Http\Request;

class NeuralNetworkController extends Controller
{
    //

    public function newNetwork() {
        return view('nn.new');
    }

    public function create(Request $request) {

        NeuralNetwork::create([
            'name' => $request->get('name'),
            'inputs' => $request->get('inputs'),
            'layers' => $request->get('layers'),
            'outputs' => $request->get('outputs'),
        ]);

        dd(1);
    }
}
