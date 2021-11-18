<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "encomendas".
 *
 * @property int $encomendaId
 * @property int $perfilId
 * @property string $estado
 * @property int $estaPago
 *
 * @property EncomendasProdutos[] $encomendasProdutos
 * @property Perfis $perfil
 * @property Produtos[] $produtos
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
            [['perfilId', 'estado', 'estaPago'], 'required'],
            [['perfilId', 'estaPago'], 'integer'],
            [['estado'], 'string', 'max' => 45],
            [['perfilId'], 'exist', 'skipOnError' => true, 'targetClass' => Perfis::className(), 'targetAttribute' => ['perfilId' => 'perfilId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'encomendaId' => 'Encomenda ID',
            'perfilId' => 'Perfil ID',
            'estado' => 'Estado',
            'estaPago' => 'Esta Pago',
        ];
    }

    /**
     * Gets query for [[EncomendasProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendasProdutos()
    {
        return $this->hasMany(EncomendasProdutos::className(), ['encomendaId' => 'encomendaId']);
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfis::className(), ['perfilId' => 'perfilId']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::className(), ['produtoId' => 'produtoId'])->viaTable('encomendas_produtos', ['encomendaId' => 'encomendaId']);
    }
}
