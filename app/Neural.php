<?php

namespace App;


use Illuminate\Support\Facades\Config;

class Neural
{

    public static function learn($w, $l) {

        $h = [
            ['input' => ($l[0]*$w[0])+($l[1]*$w[2])],
            ['input' => ($l[0]*$w[1])+($l[1]*$w[3])],
        ];

        $o = [
            'input' => 0,
            'output' => 0
        ];

        $learnSpeed = Config::get('nn.LEARN_SPEED');
        $moment = Config::get('nn.MOMENT');

        foreach ($h as $key => $value) {
            /**
             * расчет выходных значений скрытых нейронов
             * функция активации сети - Сигмоид
             */
            $h[$key]['output'] = self::sigm($value['input']);
            /**
             * входное значние выходного нейрона
             * сумма произведений выходных значений скрытых нейронов
             * на веса синапсов
             */
            $o['input'] += $h[$key]['output'] * $w[$key+4];
        }

        /**
         * значение выходного нейрона
         * функция активации сети - Сигмоид
         */
        $o['output'] = self::sigm($o['input']);

        /**
         * идеальное значение выходного нейрона
         */
        $o['ideal'] = (int)($l[0] xor $l[1]);

        /**  calculate ERROR;
         * сумма квадратов разницы идеального значения и выхода нейрона
         * деленная на кол-во выходных нейронов
         */
        $o['error'] = ($o['ideal'] - $o['output']) ** 2 / 1;

        /**
         * Delta для выходного нейрона
         * умножить разницу идеального значения и выхода нейрона
         * на производную функции активации от входного значения данного нейрона
         */
        $o['delta'] = ($o['ideal'] - $o['output']) * ((1 - $o['output']) * $o['output']);

        foreach($h as $key => $value) {
            /**
             * Delta для скрытых нейронов связанных с выходных нейроном
             * производная функции активации умноженая
             * на сумму произведений всех исходящих весов и дельты нейрона с которой этот синапс связан
             */
            $h[$key]['delta'] = ((1 - $value['output']) * $value['output']) * ($w[$key+4] * $o['delta']);

            /**
             * Sinapse weight gradient
             * равен началу синапса * на конец синапса, т.е. выход скрытого нейрона на дельта выходного нейрона
             */
            $h[$key]['SWG'] = $value['output'] * $o['delta'];

            /**
             * Дельта веса исходящего синапса
             * Произведение скорости обучения и градиента веса синапса
             * плюс произведение момента и предыдущей дельты веса синапса
             * если итерация первая - предудущая дельта веса равна 0
             */
            $h[$key]['deltaWeight'] = $learnSpeed * $h[$key]['SWG']
                + $moment * (array_key_exists('deltaWeight', $h[$key]) ? $h[$key]['deltaWeight'] : 0);

            /**
             * обновим веса синапсов
             */
            $w[$key+4] += $h[$key]['deltaWeight'];
        }

        $swg = [];
        $deltaW = [];
        for($i = 0; $i < 4; $i++) {
            $neuronKey = (int)floor(($i) / 2);
            $swg[$i] = $l[$neuronKey] * $h[(int)($i % 2)]['delta'];
            $deltaW[$i] = 0;
            $deltaW[$i] = $learnSpeed * $swg[$i] + $deltaW[$i] * $moment;
            $w[$i] += $deltaW[$i];
        }

        print_r([
            'output' => $o,
            'weights' => $w
        ]);

        return [
            'output' => $o,
            'weights' => $w
        ];
    }

    public static function sigm($x) {
        return 1 / (1 + M_E ** -$x);
    }

}