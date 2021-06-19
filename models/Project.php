<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior; // auto-populate updated_by and created_by fields with current UserID
use yii\behaviors\TimestampBehavior; // auto populate updated_at and created_at fields with current timestamp
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use app\models\ProjectStatus;
use app\models\Period;


/**
 * This is the model class for table "project".
 *
 * @property int $id Project id
 * @property int $status_id Project status id
 * @property string $project_code project code
 * @property string $project_title project title
 * @property string $start_date Project Start Date
 * @property string $end_date Project End Date
 * @property string|null $description
 * @property string $project_comment
 * @property float $budget_amount Project budget amount
 * @property int $report_period Project report period [Annual, Semi-annual, Quarterly etc]
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property IndicatorFrameworkElement[] $indicatorFrameworkElements
 * @property ProjectStatus $status
 * @property Period $reportPeriod
 * @property ProjectPartner[] $projectPartners
 */

class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project'; // specify database table for this model
    }

    /**
     * Specifiy behaviours
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            [ // update created_at and updated_at fields
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            [ // update created_by and updated_by fields
                'class' => BlameableBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ],
        ];
    }

    /**
     * Specifiy data validation rules of the model
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'project_code', 'project_title', 'start_date', 'end_date'], 'required'],
            [['status_id', 'report_period_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['budget_amount'], 'number'],
            [['project_code', 'project_title', 'description', 'project_comment'], 'string', 'max' => 1000],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['report_period_id'], 'exist', 'skipOnError' => true, 'targetClass' => Period::className(), 'targetAttribute' => ['report_period_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Project Status',
            'report_period_id' => 'Reporting Period',
            'project_code' => 'Project Code',
            'project_title' => 'Project Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'project_comment' => 'Comments',
            'budget_amount' => 'Total Budget',
        ];
    }

    /*
     * Get Project Status List
     * */

    public function getProjectStatusList(){
        $rows = ProjectStatus::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','project_status_name');

        return $rowdata;
    }
   
    /*
     * Get Project Reporting Period List
     * */

    public function getPeriodList(){
        $rows = Period::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','period_name');

        return $rowdata;
    }
    
    /**
     * Gets query for [[IndicatorFrameworkElements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorFrameworkElements()
    {
        return $this->hasMany(IndicatorFrameworkElement::className(), ['project_id' => 'id']);
    }

    /**
     * Gets query for [[Project Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ProjectStatus::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Project Reporting Period]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReportPeriod()
    {
        return $this->hasOne(Period::className(), ['id' => 'report_period_id']);
    }

    /**
     * Gets query for [[Project Partners]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPartners()
    {
        return $this->hasMany(ProjectPartner::className(), ['project_id' => 'id']);
    }

}
