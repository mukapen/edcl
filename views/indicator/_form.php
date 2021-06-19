<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Indicator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicator-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
         $elementlist = $model->getIndicatorFrameworkElementList();
         echo $form->field($model, 'indicator_framework_element_id')->dropDownList($elementlist) 
    ?>

    <?= $form->field($model, 'indicator_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_value')->textInput() ?>

    <?= $form->field($model, 'baseline_value')->textInput() ?>

    <?= $form->field($model, 'baseline_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>

    <?= $form->field($model, 'midline_value')->textInput() ?>

    <?= $form->field($model, 'midline_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>

    <?= $form->field($model, 'endline_value')->textInput() ?>
    
    <?= $form->field($model, 'endline_date')->widget(DateControl::classname(), [
        'type'=>DateControl::FORMAT_DATE,
    ]);
    ?>
    
    <?php
         $formatlist = $model->getIndicatorFormatList();
         echo $form->field($model, 'indicator_format_id')->dropDownList($formatlist) 
    ?>

    <?php
         $periodlist = $model->getDataPeriodList();
         echo $form->field($model, 'data_period_id')->dropDownList($periodlist) 
    ?>

    <?php echo $form->field($model, 'is_kpi')->dropDownList(['0' => 'No', '1' => 'Yes']
    ); ?>

    <?= $form->field($model, 'indicator_comment')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk_assumption')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
