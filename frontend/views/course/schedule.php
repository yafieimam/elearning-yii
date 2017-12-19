<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;

?>
<h1>course/create</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

	<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-course']); ?>

                <?= $form->field($model, 'tanggal')->widget(DatePicker::widget([
                    'name' => 'check_issue_date', 
                    'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'dd-M-yyyy',
                        'todayHighlight' => true
                    ]
                ])) ?>
                <!-- echo DatePicker::widget([
                    'name' => 'check_issue_date', 
                    'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'dd-M-yyyy',
                        'todayHighlight' => true
                    ]
                ]); -->
				
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>