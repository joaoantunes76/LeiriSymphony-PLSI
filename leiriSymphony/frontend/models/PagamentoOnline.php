<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class PagamentoOnline extends Model
{
    public $nome;
    public $numero;
    public $validade;
    public $cvv;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'numero', 'validade', 'cvv'], 'required'],
            ['nome', 'string'],
            ['numero', 'integer', 'max' => 9999999999999999],
            ['validade', 'date',  'format' => 'MM/yyyy'],
            ['cvv', 'integer', 'max' => 999],
        ];
    }
}