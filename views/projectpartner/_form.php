<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Projectpartner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectpartner-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $list = $model->getProjectsList();

    echo $form->field($model, 'project_id')->dropDownList($list) ?>

    <?= $form->field($model, 'organization_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_address')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
