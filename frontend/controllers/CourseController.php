<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CourseOperation;
use frontend\models\LessonOperation;
use frontend\models\TaskOperation;
use frontend\models\QuestionOperation;
use frontend\models\AnswerOperation;
use frontend\models\UploadFileTaskOperation;
use frontend\models\Enroll;
use frontend\models\Schedule;
use yii\web\UploadedFile;

class CourseController extends \yii\web\Controller
{

    public function actionCreate()
    {
        $model = new CourseOperation();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
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

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionSeecourse()
    {
        $model = new Schedule();
        $dataProvider = $model->tampil(Yii::$app->request->queryParams);

        return $this->render('seecourse', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSchedule()
    {
        $model = new Schedule();

        if ($model->load(Yii::$app->request->post())) {
            $id_course = Yii::$app->request->get('idcourse');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['seecourse', 'idcourse' => $id_course]);
            }
        }

        return $this->render('schedule', ['model' => $model]);
    }

    public function actionCreatelesson()
    {
        $model = new LessonOperation();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $id_course = Yii::$app->request->get('idcourse');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['seecourse', 'idcourse' => $id_course]);
            }
        }

        return $this->render('createlesson', ['model' => $model]);
    }

    public function actionCreatetask()
    {
        $model = new TaskOperation();

        if ($model->load(Yii::$app->request->post())) {
            $id_schedule = Yii::$app->request->get('idschedule');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['seecourse', 'idschedule' => $id_schedule]);
            }
        }

        return $this->render('createtask', ['model' => $model]);
    }

    public function actionSeeschedule()
    {
        $model = new TaskOperation();
        $dataProvider = $model->tampil(Yii::$app->request->queryParams);

        return $this->render('seeschedule', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSeetask()
    {
        $model = new UploadFileTaskOperation();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $id_schedule = Yii::$app->request->get('idschedule');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['seeschedule', 'idschedule' => $id_schedule]);
            }
        }

        return $this->render('seetask', ['model' => $model]);
    }

    public function actionCreatequestion()
    {
        $model = new QuestionOperation();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $id_schedule = Yii::$app->request->get('idschedule');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['seeschedule', 'idschedule' => $id_schedule]);
            }
        }

        return $this->render('createquestion', ['model' => $model]);
    }

    public function actionSeequestion()
    {
        $model = new QuestionOperation();
        $dataProvider = $model->tampil(Yii::$app->request->queryParams);

        return $this->render('seequestion', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSeeanswer()
    {
        $model = new AnswerOperation();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $id_schedule = Yii::$app->request->get('idschedule');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->redirect(['seequestion', 'idschedule' => $id_schedule]);
            }
        }

        return $this->render('seeanswer', ['model' => $model]);
    }
}
