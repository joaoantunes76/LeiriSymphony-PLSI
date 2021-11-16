<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marcas".
 *
 * @property int $marcaId
 * @property string $marcaNome
 *
 * @property Produtos[] $produtos
 */
class Marcas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marcas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marcaNome'], 'required'],
            [['marcaNome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'marcaId' => 'Marca ID',
            'marcaNome' => 'Marca Nome',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::className(), ['marcaId' => 'marcaId']);
    }
}
