<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectRisk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-risk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $list = $model->getProjectList();

    echo $form->field($model, 'project_id')->dropDownList($list) ?>

    <?= $form->field($model, 'risk_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'mitigation')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
