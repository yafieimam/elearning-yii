<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use frontend\models\UploadFileTask;
use yii\db\Expression;

class UploadFileTaskOperation extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;
	public $id_task;
	public $filename;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false],
            ['id_task', 'required'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
			$uploadfile = new UploadFileTask();
			$uploadfile->id_task = $this->id_task;
            $uploadfile->id_user = Yii::$app->user->identity->id;
			$uploadfile->filename = $this->file->baseName . '.' . $this->file->extension;
            $uploadfile->uploaded_at = new Expression('NOW()');
            $this->file->saveAs('uploads/task/' . $this->file->baseName . '.' . $this->file->extension);
            return $uploadfile->save() ? $uploadfile : null;
        } else {
            return null;
        }
    }
}
