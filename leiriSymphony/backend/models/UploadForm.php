<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Produtos;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $musicFile;
    public $demoFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['musicFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'ogg, mp3'],
            [['demoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'ogg, mp3'],

        ];
    }

    public function upload($name)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(\Yii::getAlias("@web") . 'uploads/' . $name . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function uploadMusic($name)
    {
        if ($this->validate()) {
            $this->musicFile->saveAs(\Yii::getAlias("@web") . 'uploads/musics/' . $name . '.' . $this->musicFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function uploadDemo($name)
    {
        if ($this->validate()) {
            $this->demoFile->saveAs(\Yii::getAlias("@web") . 'uploads/demos/' . $name . '.' . $this->demoFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
