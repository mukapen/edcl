<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectRisk */

$this->title = 'Create Project Risk';
$this->params['breadcrumbs'][] = ['label' => 'Project Risks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-risk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
