<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Projectpartner */

$this->title = 'Add Project Partner';
$this->params['breadcrumbs'][] = ['label' => 'Add Project Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectpartner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
