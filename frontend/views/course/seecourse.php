<?php
/* @var $this yii\web\View */
use common\models\Course;
use yii\helpers\Html;

$id_course = Yii::$app->request->get('idcourse');

$course = Course::find()->select('name')->where(['id' => $id_course])->one();
?>
<h1>Course <?php echo $course->name ?></h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<p>
<?= Html::a('Create Schedule', ['/course/schedule', 'idcourse' => $id_course], ['class'=>'btn btn-primary grid-button']) ?>
</p>
