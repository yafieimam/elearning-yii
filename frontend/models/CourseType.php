<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "course_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 */
class CourseType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'info'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['info'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'info' => 'Info',
        ];
    }
}
