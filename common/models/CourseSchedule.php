<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_schedule".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_course
 * @property string $tanggal
 */
class CourseSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_course', 'tanggal'], 'required'],
            [['id_user', 'id_course'], 'integer'],
            [['tanggal'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_course' => 'Id Course',
            'tanggal' => 'Tanggal',
        ];
    }
}
