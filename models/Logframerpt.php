<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logframerpt".
 *
 * @property int $projectID
 * @property string $projectCode
 * @property string $projectTitle
 * @property string|null $projectDescription
 * @property string $startDate Project Start Date
 * @property string $endDate Project End Date
 * @property string|null $baselineDate Baseline survey date
 * @property string|null $midtermDate Mid term survey date
 * @property string|null $evaluationDate Evaluation survey date
 * @property int $indicatorID
 * @property string $Indicator
 * @property string|null $descripton
 * @property string $indicaterCategory
 * @property int $subIndicatorID
 * @property string $subIndicator
 * @property string|null $subDescription
 * @property string|null $baselineValue Baseline Survey Value
 * @property string|null $midtermValue Mid Term Survey Value
 * @property string|null $targetValue Target Value
 * @property string|null $endtermValue End Term Evaluation Value
 * @property string $mDate Milestone Date
 * @property string $milestone Milestone Value
 * @property float|null $performance 
 */
class Logframerpt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logframerpt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projectID', 'indicatorID', 'subIndicatorID'], 'integer'],
            [['projectCode', 'projectTitle', 'startDate', 'endDate', 'Indicator', 'indicaterCategory', 'subIndicator', 'mDate', 'milestone'], 'required'],
            [['startDate', 'endDate', 'baselineDate', 'midtermDate', 'evaluationDate', 'mDate'], 'safe'],
            [['projectCode', 'projectTitle', 'indicaterCategory', 'subIndicator', 'subDescription', 'baselineValue', 'midtermValue', 'targetValue', 'endtermValue', 'milestone'], 'string', 'max' => 500],
            [['projectDescription', 'Indicator', 'descripton'], 'string', 'max' => 1000],
        ];
    }
    
    /**
     * Performance =($endtermValue divide by $targetValue)x100
     */
    public function getPerformance(){
      
        if ($this->targetValue == 0 || $this->endtermValue == 0) {
             return 0;
        } else {
            return (($this->endtermValue-$this->targetValue)/$this->targetValue);
        }
      }
      
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'projectID' => 'Project ID',
            'projectCode' => 'Project Code',
            'projectTitle' => 'Project Title',
            'projectDescription' => 'Project Description',
            'startDate' => 'Project Start Date',
            'endDate' => 'Project End Date',
            'baselineDate' => 'Baseline survey date',
            'midtermDate' => 'Mid term survey date',
            'evaluationDate' => 'Evaluation survey date',
            'indicatorID' => 'Indicator ID',
            'Indicator' => 'Indicator',
            'descripton' => 'Descripton',
            'indicaterCategory' => 'Indicater Category',
            'subIndicatorID' => 'Sub Indicator ID',
            'subIndicator' => 'Sub Indicator',
            'subDescription' => 'Sub Description',
            'baselineValue' => 'Baseline Survey Value',
            'midtermValue' => 'Mid Term Survey Value',
            'targetValue' => 'Target Value',
            'endtermValue' => 'End Term Value',
            'mDate' => 'Milestone Date',
            'milestone' => 'Milestone Value',
        ];
    }
}
