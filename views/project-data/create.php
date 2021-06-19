<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectData */

$this->title = 'Add Project Data';
$this->params['breadcrumbs'][] = ['label' => 'Project Data List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
