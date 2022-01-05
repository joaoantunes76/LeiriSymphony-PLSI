<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "encomendas".
 *
 * @property int $id
 * @property int $idperfil
 * @property string $estado
 * @property int $pago
 * @property float $preco
 * @property string $tipoexpedicao
 * @property string $data
 *
 * @property Encomendasprodutos[] $encomendasprodutos
 * @property Perfis $idperfil0
 * @property Produtos[] $idprodutos
 */
class Encomendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encomendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperfil', 'estado', 'pago', 'preco', 'tipoexpedicao'], 'required'],
            [['idperfil'], 'integer'],
            [['pago'], 'integer', 'min' => 0, 'max' => 1],
            [['estado', 'tipoexpedicao'], 'string'],
            [['estado'], 'in', 'range' => ['Em Processamento', 'Expedido', 'Entregue', 'Pronto para Levantamento', 'Cancelada', 'Erro']],
            [['tipoexpedicao'], 'in', 'range' => ['Levantamento em loja', 'Envio']],
            [['preco'], 'number', 'min' => 0],
            [['data'], 'string'],
            [['idperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfis::className(), 'targetAttribute' => ['idperfil' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idperfil' => 'Idperfil',
            'estado' => 'Estado',
            'pago' => 'Pago',
            'preco' => 'Preco',
            'tipoexpedicao' => 'Tipoexpedicao',
            'data' => 'Data',
        ];
    }

    /**
     * Gets query for [[Encomendasprodutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendasprodutos()
    {
        return $this->hasMany(Encomendasprodutos::className(), ['idencomenda' => 'id']);
    }

    /**
     * Gets query for [[Idperfil0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdperfil0()
    {
        return $this->hasOne(Perfis::className(), ['id' => 'idperfil']);
    }

    /**
     * Gets query for [[Idprodutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdprodutos()
    {
        return $this->hasMany(Produtos::className(), ['id' => 'idproduto'])->viaTable('encomendasprodutos', ['idencomenda' => 'id']);
    }
}
