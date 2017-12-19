<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $name
 * @property integer $id_user
 * @property string $status
 * @property string $description
 * @property integer $type
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'id_user', 'status', 'description', 'type'], 'required'],
            [['id_user', 'type'], 'integer'],
            [['name', 'status'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
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
            'id_user' => 'Id User',
            'status' => 'Status',
            'description' => 'Description',
            'type' => 'Type',
        ];
    }
}
