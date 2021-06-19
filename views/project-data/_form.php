<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-data-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
         $typelist = $model->getProjectDataTypeList();
         echo $form->field($model, 'project_data_type_id')->dropDownList($typelist);
    ?>

    <?php
         $indicatorlist = $model->getIndicatorList();
         echo $form->field($model, 'indicator_id')->dropDownList($indicatorlist);
    ?> 
    
    <?= $form->field($model, 'value_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'data_comment')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
