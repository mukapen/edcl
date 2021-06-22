<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndicatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicators - Evaluation Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-index-eval-data">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [   'attribute' => 'indicatorFrameworkElement.element',
                'label' => 'Framework Element',
                'options' => ['width' => '150'],
            ],
            [   'attribute' => 'indicator_name',
                'label' => 'Indicator',
                'options' => ['width' => '200'],
            ],
            'baseline_value',
           // 'baseline_date:date',
            //'midline_date',
            //'endline_date',
            [   'attribute' => 'target_value',
                'label' => 'Target',
            ],
            'midline_value',
           'endline_value',
           [   
            'attribute' => 'performance',
            'options' => ['width' => '100'],
            'format' => 'percent',
           ],

            //'indicator_format_id',
            //'data_period_id',
            //'unit',
            //'is_kpi',
            //'indicator_comment',
            //'risk_assumption',
            //'created_at',
            //'created_by',

            [   'attribute' => 'updated_at',
                'format' => 'date',
                'options' => ['width' => '100'],
            ],

            //'updated_by',
            //URL /index.php?r=post/view&id=100

            [
             'class' => 'yii\grid\ActionColumn',
             'template' => '{update}',
             'urlCreator' => function ($action, $model, $key, $index){
                 if ($action=='update') {
                     return Url::to(['update-eval-data', 'id' => $key]);
                 }
             }
           ],
        ],
    ]); ?>


</div>
