<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_code',
            'project_title',
            [   'attribute' => 'budget_amount',
                'format' => 'currency',
            ],
            [   'attribute' => 'start_date',
                'format' => 'date',
                'options' => ['width' => '100'],
            ],
            [   'attribute' => 'end_date',
                'format' => 'date',
                'options' => ['width' => '100'],
            ],
            [   'attribute' => 'status.project_status_name',
                'options' => ['width' => '100'],
            ],
            [   'attribute' => 'updated_at',
                'format' => 'date',
                'options' => ['width' => '100'],
            ],

           ['class' => 'yii\grid\ActionColumn',
           'options' => ['width' => '70'],
           ],
        ],

    ]); ?>


</div>
