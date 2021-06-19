<?php
namespace app\models;

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectpartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$country = new Country ();
//$country->code = 'KE';
//$country->name = 'KENYA';
//$country->population = '45000000';
//$country->save();

echo "Step 2. Quering Data" . "<br>";

$projectpartner = Projectpartner::find()
    ->where(['partnerID' => '1'])
    ->one();

echo " Partner Name = ". $projectpartner->name. "<br>";

$project = $projectpartner->project;

//$sql = 'SELECT * from project where projectID=:projectID';
//$project = Project::findBySql($sql, [':projectID' => '1'])->one();
    
echo "Project Code = ". $project->Code. "<br>";




?>

<?php

?>

