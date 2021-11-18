<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $categoriaId
 * @property string $nome
 *
 * @property Subcategoria[] $subcategorias
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoriaId' => 'Categoria ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Subcategorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategorias()
    {
        return $this->hasMany(Subcategoria::className(), ['categoriaId' => 'categoriaId']);
    }
}
