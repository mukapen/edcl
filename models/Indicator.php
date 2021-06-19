<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior; // auto-populate updated_by and created_by fields with current UserID
use yii\behaviors\TimestampBehavior; // auto populate updated_at and created_at fields with current timestamp
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use app\models\Period;
use app\models\IndicatorFrameworkElement;
use app\models\IndicatorFormat;
  
/**
 * This is the model class for table "indicator".
 *
 * @property int $id
 * @property int|null $indicator_framework_element_id
 * @property string $indicator_name Name of indicator
 * @property string|null $description Description of indicator
 * @property string|null $baseline_date Baseline Evaluation Date
 * @property string|null $midline_date Midline Evaluation Date
 * @property string|null $endline_date Endline Evaluation Date
 * @property float|null $baseline_value Baseline Evaluation Value
 * @property float|null $midline_value Midline Evaluation Value
 * @property float|null $target_value Life of Project Target Value
 * @property float|null $endline_value Endline Evaluation Value
 * @property int $indicator_format_id Number or Percent
 * @property int $data_period_id Data Collection Frequency
 * @property string|null $unit Unit of Measure
 * @property int $is_kpi
 * @property string|null $indicator_comment
 * @property string|null $risk_assumption
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 * @property int|null $performance
 *
 * @property IndicatorFormat $indicatorFormat
 * @property IndicatorFrameworkElement $indicatorFrameworkElement
 * @property Period $dataPeriod
 * @property Milestone[] $milestones
 */
class Indicator extends \yii\db\ActiveRecord
{    
    public $indicatorperformance;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicator';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indicator_framework_element_id', 'indicator_format_id', 'data_period_id', 'is_kpi'], 'integer'],
            [['indicator_name'], 'required'],
            [['baseline_date', 'midline_date', 'endline_date'], 'safe'],
            [['baseline_value', 'midline_value', 'target_value', 'endline_value'], 'number'],
            [['indicator_name', 'description'], 'string', 'max' => 500],
            [['unit'], 'string', 'max' => 20],
            [['indicator_comment', 'risk_assumption'], 'string', 'max' => 1000],
            [['indicator_format_id'], 'exist', 'skipOnError' => true, 'targetClass' => IndicatorFormat::className(), 'targetAttribute' => ['indicator_format_id' => 'id']],
            [['indicator_framework_element_id'], 'exist', 'skipOnError' => true, 'targetClass' => IndicatorFrameworkElement::className(), 'targetAttribute' => ['indicator_framework_element_id' => 'id']],
            [['data_period_id'], 'exist', 'skipOnError' => true, 'targetClass' => Period::className(), 'targetAttribute' => ['data_period_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {  
        return [
            'id' => 'ID',
            'indicator_framework_element_id' => 'Indicator Framework Element ID',
            'indicator_name' => 'Indicator',
            'indicatorFrameworkElement.element' => 'Framework Element',
            'indicatorFrameworkElement.description' => 'Framework Element Description',
            'description' => 'Description',
            'baseline_date' => 'Baseline Date',
            'midline_date' => 'Midline Date',
            'endline_date' => 'Endline Date',
            'baseline_value' => 'Baseline',
            'midline_value' => 'Midline',
            'target_value' => 'Life of Project (LOP) Target',
            'endline_value' => 'Endline',
            'indicator_format_id' => 'Format',
            'data_period_id' => 'Data Collection Frequency',
            'unit' => 'Unit of Measure',
            'is_kpi' => 'KPI',
            'indicator_comment' => 'Indicator Comment',
            'risk_assumption' => 'Risks/ Assumptions',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    
    /**
     * Performance =($endtermValue divide by $targetValue)x100
     */
    public function getPerformance(){
      
        if ($this->target_value == 0 || $this->endline_value == 0) {
             return 0;
        } else {
            return (($this->endline_value-$this->target_value)/$this->target_value);
        }
      }

    /*
     * Get Indicator Format List
     * */

    public function getIndicatorFormatList(){
        $rows = IndicatorFormat::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','format');

        return $rowdata;
    }
    
    /*
     * Get Indicator Framework Element List
     * */

    public function getIndicatorFrameworkElementList(){
        $rows = IndicatorFrameworkElement::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','element');

        return $rowdata;
    }
    
    /*
     * Get Data Collection Period List
     * */

    public function getDataPeriodList(){
        $rows = Period::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','period_name');

        return $rowdata;
    }
    
    /**
     * Gets query for [[IndicatorFrameworkElement]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorFrameworkElement()
    {
        return $this->hasOne(IndicatorFrameworkElement::className(), ['id' => 'indicator_framework_element_id']);
    }
    
    /**
     * Gets query for [[IndicatorFormat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorFormat()
    {
        return $this->hasOne(IndicatorFormat::className(), ['id' => 'indicator_format_id']);
    }

    /**
     * Gets query for [[DataPeriod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataPeriod()
    {
        return $this->hasOne(Period::className(), ['id' => 'data_period_id']);
    }

    /**
     * Gets query for [[ProjectData]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectData()
    {
        return $this->hasMany(ProjectData::className(), ['indicator_id' => 'id']);
    }

}
