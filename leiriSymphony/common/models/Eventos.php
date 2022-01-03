<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "eventos".
 *
 * @property int $id
 * @property int $lotacao
 * @property string $descricao
 * @property string $data
 * @property string $horainicio
 * @property string $horafim
 *
 * @property Eventosperfis[] $eventosperfis
 * @property Perfis[] $idperfils
 */
class Eventos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eventos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lotacao', 'descricao', 'data', 'horainicio', 'horafim'], 'required'],
            [['lotacao'], 'integer'],
            [['descricao'], 'string'],
            [['data', 'horainicio', 'horafim'], 'safe'],
            [['data'], 'date', 'format' => 'php:Y-m-d'],
            ['data', 'validateDate'],
            ['horainicio', 'validateHoras']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lotacao' => 'Lotacao',
            'descricao' => 'Descricao',
            'data' => 'Data',
            'horainicio' => 'Horainicio',
            'horafim' => 'Horafim',
        ];
    }

    /*
     * Valida data de lançamento
     */
    public function validateDate(){
        if(strtotime($this->data) < strtotime(date('Y-m-d'))){
            $this->addError('datalancamento','Por favor adicione uma data válida');
        }
    }
    /*
     * Valida a hora de inicio e a hora de fim do evento
     */
    public function validateHoras(){
        if(strtotime($this->horainicio) > strtotime($this->horafim)){
            $this->addError('horainicio','Por favor insira uma hora de inicio válida');
            $this->addError('horafim','Por favor insira uma hora de fim válida');
        }
    }

    /**
     * Gets query for [[Eventosperfis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventosperfis()
    {
        return $this->hasMany(Eventosperfis::className(), ['idevento' => 'id']);
    }

    /**
     * Gets query for [[Idperfils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdperfils()
    {
        return $this->hasMany(Perfis::className(), ['id' => 'idperfil'])->viaTable('eventosperfis', ['idevento' => 'id']);
    }
}
