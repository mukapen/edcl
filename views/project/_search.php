<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'project_code') ?>

    <?= $form->field($model, 'project_title') ?>

    <?= $form->field($model, 'start_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>

    <?= $form->field($model, 'end_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>

    <?php  echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
