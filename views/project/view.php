<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'View Project Details';
$this->params['breadcrumbs'][] = ['label' => 'View Project Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

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
            'project_code',
            'project_title',
            'description:html',
            [   'attribute' => 'budget_amount',
                'format' => 'currency',
            ],
            [   'attribute' => 'start_date',
                'format' => 'date',
            ],
            [   'attribute' => 'end_date',
                'format' => 'date',
            ],
            'project_comment',
            'status.project_status_name',
            [   'attribute' => 'reportPeriod.period_name',
                'label' => 'Reporting Period',
            ],
            'updated_at:datetime',

        ],
    ]) ?>

</div>
