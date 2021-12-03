<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subcategorias".
 *
 * @property int $id
 * @property int $idsubcategoria
 * @property string $nome
 *
 * @property Categorias $idsubcategoria0
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
            [['idsubcategoria', 'nome'], 'required'],
            [['idsubcategoria'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['idsubcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['idsubcategoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idsubcategoria' => 'Idsubcategoria',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Idsubcategoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdsubcategoria0()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'idsubcategoria']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::className(), ['idsubcategoria' => 'id']);
    }
}
