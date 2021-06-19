<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndicatorFrameworkElementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Framework Elements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-framework-element-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Framework Element', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'project.project_code',
            [ 'attribute' => 'indicatorCategory.category_name',
              'options' => ['width' => '100'],
            ],
            [ 'attribute' => 'element',
              'options' => ['width' => '100'],
            ],

            'description',
            //'created_at',
            //'created_by',
            [ 'attribute' => 'updated_at',
              'format' => 'date',
              'options' => ['width' => '100'],
            ],
           
            ['class' => 'yii\grid\ActionColumn',
           'options' => ['width' => '70'],
           ],
        ],
    ]); ?>


</div>
