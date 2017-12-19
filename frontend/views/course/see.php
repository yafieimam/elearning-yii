<?php
/* @var $this yii\web\View */
use common\models\Course;
use yii\helpers\Html;

?>
<h1>course/delete</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?php
	//$titles = Yii::$app->db->createCommand('SELECT title FROM freebies')->queryColumn();
	$member = Course::find()->select('name, description, id')->where(['id_user' => Yii::$app->user->identity->id])->all();
	foreach($member as $value){
?>
		<div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/300x200" alt="">
            <div class="card-body">
              	<h4 class="card-title"><?php echo $value->name ?></h4>
              <p class="card-text"><?php echo $value->description ?></p>
            </div>
            <div class="card-footer">
              <?= Html::a('See More', ['/course/seecourse', 'idcourse' => $value->id], ['class'=>'btn btn-primary']) ?>
            </div>
          </div>
        </div>
<?php
	}
?>