<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Projectpartner */

$this->title = 'Update Partner Details';
$this->params['breadcrumbs'][] = ['label' => 'Partners Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->organization_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="projectpartner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
