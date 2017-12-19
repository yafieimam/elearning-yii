<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CreateCourse;
use frontend\models\Enroll;

class CourseController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new CreateCourse();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionEnroll()
    {
        $model = new Enroll();

        $model->id_course = Yii::$app->request->get('id');
        if ($model->upload()) {
            // file is uploaded successfully
            return $this->redirect(['index']);
        }
    }

    public function actionDeleteenroll()
    {
        $model = new Enroll();

        $model->id_course = Yii::$app->request->get('idcourse');
        $model->id_user = Yii::$app->request->get('iduser');
        if ($model->delete()) {
            // file is uploaded successfully
            return $this->redirect(['view']);
        }
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdateenroll()
    {
        $model = new Enroll();

        $model->id_course = Yii::$app->request->get('idcourse');
        $model->id_user = Yii::$app->request->get('iduser');
        if ($model->update()) {
            // file is uploaded successfully
            return $this->redirect(['view']);
        }
    }

    public function actionSee()
    {
        return $this->render('see');
    }

    public function actionSeecourse()
    {
        return $this->render('seecourse');
    }

    public function actionSchedule()
    {
        return $this->render('schedule');
    }


}
