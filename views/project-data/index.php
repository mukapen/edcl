<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Data List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'indicator.indicator_name',
            'projectDataType.type',
            'indicatorFormat.format',
            'value',
            'value_date:date',
            //'data_comment',
            [   'attribute' => 'created_at',
                'format' => 'date',
                'options' => ['width' => '100'],
            ],
            //'created_by',
            //'updated_at',
            //'updated_by',
            
            ['class' => 'yii\grid\ActionColumn',
           'options' => ['width' => '70'],
           ],
        ],
    ]); ?>


</div>
