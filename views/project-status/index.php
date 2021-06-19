<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Status List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-status-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Project Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_status_name',
            'description',
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
