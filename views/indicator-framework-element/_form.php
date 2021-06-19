<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndicatorFrameworkElement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicator-framework-element-form">

    <?php $form = ActiveForm::begin(); ?>
    
   <?php
    $list = $model->getProjectsList();

    echo $form->field($model, 'project_id')->dropDownList($list) ?>

   <?php
    $categorylist = $model->getIndicatorCategoryList();

    echo $form->field($model, 'indicator_category_id')->dropDownList($categorylist) ?>
    
    <?= $form->field($model, 'element')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
