<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <?= $form->field($model, 'project_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>

    <?= $form->field($model, 'end_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>

    <?= $form->field($model, 'project_comment')->textarea(['maxlength' => true]) ?>

    <?php
         $list = $model->getProjectStatusList();

    echo $form->field($model, 'status_id')->dropDownList($list) ?>

    <?php
    $list = $model->getPeriodList();

    echo $form->field($model, 'report_period_id')->dropDownList($list) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
