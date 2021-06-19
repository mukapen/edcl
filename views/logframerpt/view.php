<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Logframerpt */

$this->title = 'View Log-Frame Report';
$this->params['breadcrumbs'][] = ['label' => 'Logframerpt', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="logframerpt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'statusID',
            'Name',
            'Description',
        ],
    ]) ?>

</div>
