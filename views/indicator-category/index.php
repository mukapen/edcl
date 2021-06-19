<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndicatorCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicator Category List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [   'attribute' => 'category_name',
                'options' => ['width' => '100'],
            ],
            [   'attribute' => 'description',
                
            ],
            [   'attribute' => 'display_order',
                'options' => ['width' => '50'],
            ],
            [   'attribute' => 'updated_at',
                'format' => 'date',
                'options' => ['width' => '100'],
            ],
            
            ['class' => 'yii\grid\ActionColumn',
           'options' => ['width' => '70'],
           'visibleButtons' => ['delete' => false,],
           ],
        ],
    ]); ?>


</div>
