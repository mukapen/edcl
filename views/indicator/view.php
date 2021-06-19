<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indicator */

$this->title = 'View Indicator Detail';
$this->params['breadcrumbs'][] = ['label' => 'Indicators List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="indicator-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'indicatorFrameworkElement.element',
            'indicatorFrameworkElement.description',
            'indicator_name',
            'description',
            'target_value',
            'baseline_value',
            'baseline_date:datetime',
            'midline_value',
            'midline_date:datetime',
            'endline_value',
            'endline_date:datetime',
            'indicatorFormat.format',
            [   
                'attribute' => 'dataPeriod.period_name',
                'label' => 'Data collection Frequency',
             ],
            'indicator_comment',
            'risk_assumption',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
