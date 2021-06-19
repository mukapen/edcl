<?php
use yii\helpers\Html;

?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Your Name is</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Your Email is</label>: <?= Html::encode($model->email) ?></li>
    <li><label>You are</label>: <?= Html::encode($model->age) ?> Old</li>
</ul>