<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property int $albuns_id
 * @property int $perfis_id
 *
 * @property Albuns $albuns
 * @property Perfis $perfis
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['albuns_id', 'perfis_id'], 'required'],
            [['albuns_id', 'perfis_id'], 'integer'],
            [['albuns_id', 'perfis_id'], 'unique', 'targetAttribute' => ['albuns_id', 'perfis_id']],
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
            'albuns_id' => 'Albuns ID',
            'perfis_id' => 'Perfis ID',
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
