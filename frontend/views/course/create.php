<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\CourseType;
use yii\helpers\ArrayHelper;

?>
<h1>course/create</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

	<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-course']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'status') ?>

                <?= $form->field($model, 'description') ?>
				
				<?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(CourseType::find()->all(),'id','name'),['prompt'=>'Select Course Type']); ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>