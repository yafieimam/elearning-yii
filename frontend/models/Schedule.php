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
    public $tanggal;

    public function create()
    {
        if ($this->validate()) {
			$schedule = new CourseSchedule();
			$schedule->id_user = Yii::$app->user->identity->id;
			$schedule->id_course = $this->id_course;
			$schedule->tanggal = $this->tanggal;
            return $schedule->save() ? $schedule : null;
        } else {
            return null;
        }
    }
}
