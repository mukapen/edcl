<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectpartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Partners List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectpartner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Partner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [   
                'attribute' => 'project.project_code',
                'options' => ['width' => '150'],
            ],
            [   
                'attribute' => 'organization_name',
                'options' => ['width' => '400'],
            ],
            [   
                'attribute' => 'role',
                'options' => ['width' => '200'],
            ],
            [   
                'attribute' => 'updated_at',
                'format' => 'date',
            ],
           
            
            ['class' => 'yii\grid\ActionColumn',
            'options' => ['width' => '70'],
            ],
        ],
    ]); ?>

</div>
