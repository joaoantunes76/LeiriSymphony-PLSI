<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinhoalbuns".
 *
 * @property int $perfis_id
 * @property int $albuns_id
 *
 * @property Albuns $albuns
 * @property Perfis $perfis
 */
class Carrinhoalbuns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrinhoalbuns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perfis_id', 'albuns_id'], 'required'],
            [['perfis_id', 'albuns_id'], 'integer'],
            [['perfis_id', 'albuns_id'], 'unique', 'targetAttribute' => ['perfis_id', 'albuns_id']],
            [['albuns_id'], 'exist', 'skipOnError' => true, 'targetClass' => Albuns::className(), 'targetAttribute' => ['albuns_id' => 'id']],
            [['perfis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfis::className(), 'targetAttribute' => ['perfis_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'perfis_id' => 'Perfis ID',
            'albuns_id' => 'Albuns ID',
        ];
    }

    /**
     * Gets query for [[Albuns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbuns()
    {
        return $this->hasOne(Albuns::className(), ['id' => 'albuns_id']);
    }

    /**
     * Gets query for [[Perfis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfis()
    {
        return $this->hasOne(Perfis::className(), ['id' => 'perfis_id']);
    }
}
