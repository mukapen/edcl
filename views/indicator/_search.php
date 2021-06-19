<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndicatorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'indicator_framework_element_id') ?>

    <?= $form->field($model, 'indicator_name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'baseline_date') ?>

    <?php // echo $form->field($model, 'midline_date') ?>

    <?php // echo $form->field($model, 'endline_date') ?>

    <?php // echo $form->field($model, 'baseline_value') ?>

    <?php // echo $form->field($model, 'midline_value') ?>

    <?php // echo $form->field($model, 'target_value') ?>

    <?php // echo $form->field($model, 'endline_value') ?>

    <?php // echo $form->field($model, 'indicator_format_id') ?>

    <?php // echo $form->field($model, 'data_period_id') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'is_kpi') ?>

    <?php // echo $form->field($model, 'indicator_comment') ?>

    <?php // echo $form->field($model, 'risk_assumption') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
