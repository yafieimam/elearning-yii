<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use frontend\models\QuestionOption;
use yii\db\Expression;
use yii\data\ActiveDataProvider;

class AnswerOperation extends Model
{
    /**
     * @var UploadedFile
     */
    public $jawaban;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            ['jawaban', 'required'],
            ['score', 'required'],
            ['id_schedule', 'required'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
			$uploadfile = new QuestionOption();
			$uploadfile->jawaban = $this->jawaban;
            $uploadfile->create_at = new Expression('NOW()');
            return $uploadfile->save() ? $uploadfile : null;
        } else {
            return null;
        }
    }
}
