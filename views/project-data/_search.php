<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    
    <?= $form->field($model, 'indicator.indicator_name') ?>

    <?= $form->field($model, 'projectDataType.type') ?>

    <?= $form->field($model, 'value') ?>

    <?php echo $form->field($model, 'data_comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
