<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\CourseMember;

class Enroll extends Model
{
    /**
     * @var UploadedFile
     */

    public $id_course;
    public $id_user;

    public function upload()
    {
        if ($this->validate()) {
			$enroll = new CourseMember();
			$enroll->id_user = Yii::$app->user->identity->id;
			$enroll->id_course = $this->id_course;
			$enroll->status = 0;
            return $enroll->save() ? $enroll : null;
        } else {
            return null;
        }
    }

    public function delete()
    {
        if ($this->validate()) {
            return CourseMember::deleteAll('id_user = :id_user AND id_course = :id_course', [':id_user' => $this->id_user, ':id_course' => $this->id_course]);
        } else {
            return null;
        }
    }

    public function update()
    {
        if ($this->validate()) {
            $connection = Yii::$app->db;
            return $connection->createCommand()->update('course_member', ['status' => 1], 'id_user = :id_user AND id_course = :id_course', [':id_user' => $this->id_user, ':id_course' => $this->id_course])->execute();
        } else {
            return null;
        }
    }
}
