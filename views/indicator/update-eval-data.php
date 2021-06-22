<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Indicator */

$this->title = 'Update Indicator Evaluation Data: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Indicators - Evaluation Data', 'url' => ['index-eval-data']];
?>

<div class="indicator-eval-data-form">

<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'indicator_name')->textInput(['maxlength' => true]) ?>

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
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
