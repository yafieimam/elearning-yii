<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Course;

class CreateCourse extends Model
{
    /**
     * @var UploadedFile
     */
    public $name;
	public $status;
    public $type;
	public $description;

    public function rules()
    {
        return [
            ['name', 'required'],
            ['description', 'required'],
            ['status', 'required'],
            ['type', 'required'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
			$course = new Course();
			$course->id_user = Yii::$app->user->identity->id;
			$course->name = $this->name;
			$course->status = $this->status;
			$course->description = $this->description;
            $course->type = $this->type;
            return $course->save() ? $course : null;
        } else {
            return null;
        }
    }
}
