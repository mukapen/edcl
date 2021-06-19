<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectpartnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectpartner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'project.project_code') ?>

    <?= $form->field($model, 'organization_name') ?>

    <?= $form->field($model, 'role') ?>

    <?= $form->field($model, 'organization_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
