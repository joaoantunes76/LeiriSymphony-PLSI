<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "imagens".
 *
 * @property int $imagemId
 * @property resource $imagem
 * @property int $produtoId
 *
 * @property Produtos $produto
 */
class Imagens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imagem', 'produtoId'], 'required'],
            [['imagem'], 'string'],
            [['produtoId'], 'integer'],
            [['produtoId'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['produtoId' => 'produtoId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imagemId' => 'Imagem ID',
            'imagem' => 'Imagem',
            'produtoId' => 'Produto ID',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produtos::className(), ['produtoId' => 'produtoId']);
    }
}
