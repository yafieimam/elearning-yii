<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use common\models\Course;

?>
<h1>course/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<p>
<?= Html::a('Create Course', ['/course/create'], ['class'=>'btn btn-primary grid-button']) ?>
</p>

<?php
	//$titles = Yii::$app->db->createCommand('SELECT title FROM freebies')->queryColumn();
	$course = Course::find()->select('id, name, id_user, description')->all();
	foreach($course as $value){
?>
		<div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              <h4 class="card-title"><?php echo $value->name ?></h4>
              <!-- <p class="card-text"><?php $value->description?></p> -->
              <p class="card-text"><?php echo $value->description?></p>
            </div>
            <div class="card-footer">
              <?= Html::a('Enroll Me!', ['/course/enroll', 'id' => $value->id], ['class'=>'btn btn-primary']) ?>
            </div>
          </div>
        </div>
<?php
	}
?>