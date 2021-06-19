<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogframerptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="logframerpt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           ['class' => 'yii\grid\SerialColumn',
           'options' => ['width' => '70'],
          ], // Data from the model's column will be used.

            [   'attribute' => 'Indicator',
                'options' => ['width' => '300'],
            ],
            [   'attribute' => 'subIndicator',
                'options' => ['width' => '300'],
            ],
            [   'attribute' => 'targetValue',
                'label' => 'Target',
                'options' => ['width' => '50'],
            ],
            [   'attribute' => 'baselineValue',
                'label' => 'Baseline',
                'options' => ['width' => '50'],
            ],
            [   'attribute' => 'midtermValue',
                'label' => 'Mid Term',
                'options' => ['width' => '50'],
            ],
            [   'attribute' => 'endtermValue',
                'label' => 'End Term',
                'options' => ['width' => '50'],
            ],
            [
                'attribute' => 'performance',
                'label' => 'Status (%)',
                'format' => 'percent',
                'options' => ['width' => '50'],
            ],
 
        ],
    ]); ?>


</div>
