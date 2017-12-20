<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use frontend\models\Course;
use frontend\models\Task;
use yii\db\Expression;

class CourseOperation extends Model
{
    /**
     * @var UploadedFile
     */
    public $title;
	public $slug;
    public $type;
	public $description;
    public $file;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'required'],
            ['type', 'required'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $model = new Course();
            $model->title = $this->title;
            if (empty($this->slug)){
                $lower = strtolower($this->title);
                $slug = str_replace(' ', '-', $lower);
                $model->slug = $slug;
            }else{
                $model->slug = $this->slug;
            }
            $model->mentor = Yii::$app->user->identity->id;
            $model->status = 1;
            $model->description = $this->description;
            $model->course_image = $this->file->baseName . '.' . $this->file->extension;
            $model->type = $this->type;
            $model->create_at = new Expression('NOW()');
            $this->file->saveAs('uploads/course/images/' . $this->file->baseName . '.' . $this->file->extension);
            return $model->save() ? $model : null;
        } else {
            return null;
        }
    }

    public function taskupload()
    {
        if ($this->validate()) {
            $model = new Task();
            $model->title = $this->title;
            if (empty($this->slug)){
                $lower = strtolower($this->title);
                $slug = str_replace(' ', '-', $lower);
                $model->slug = $slug;
            }else{
                $model->slug = $this->slug;
            }
            $model->mentor = Yii::$app->user->identity->id;
            $model->status = 1;
            $model->description = $this->description;
            $model->course_image = $this->file->baseName . '.' . $this->file->extension;
            $model->type = $this->type;
            $model->create_at = new Expression('NOW()');
            $this->file->saveAs('uploads/course/images/' . $this->file->baseName . '.' . $this->file->extension);
            return $model->save() ? $model : null;
        } else {
            return null;
        }
    }
}
