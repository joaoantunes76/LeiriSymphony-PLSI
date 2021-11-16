<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcategorias".
 *
 * @property int $subcategoriaId
 * @property int $categoriaId
 * @property string $nome
 *
 * @property Categorias $categoria
 * @property Produtos[] $produtos
 */
class Subcategorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoriaId', 'nome'], 'required'],
            [['categoriaId'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['categoriaId'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoriaId' => 'categoriaId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subcategoriaId' => 'Subcategoria ID',
            'categoriaId' => 'Categoria ID',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['categoriaId' => 'categoriaId']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::className(), ['subcategoriaId' => 'subcategoriaId']);
    }
}
