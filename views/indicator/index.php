<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndicatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicators List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Indicator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
            [   'attribute' => 'description',
                'options' => ['width' => '400'],
            ],
            'baseline_value',
            //'baseline_date:date',
            //'midline_date:date',
            //'endline_date:date',
            [   'attribute' => 'target_value',
                'label' => 'LOP Target',
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

            ['class' => 'yii\grid\ActionColumn',
              'header' => 'Action',
             'options' => ['width' => '80'],
           ],
        ],
        
    ]); ?>


</div>
