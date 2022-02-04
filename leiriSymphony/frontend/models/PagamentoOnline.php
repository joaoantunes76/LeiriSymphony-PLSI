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
            ['numero', 'string', 'max' => '16'],
            ['numero', 'match', 'pattern' => '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/m'],
            ['validade', 'date',  'format' => 'MM/yyyy'],
            ['cvv', 'integer', 'max' => 999],
        ];
    }
}