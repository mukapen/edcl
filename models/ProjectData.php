<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior; // auto-populate updated_by and created_by fields with current UserID
use yii\behaviors\TimestampBehavior; // auto populate updated_at and created_at fields with current timestamp
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use app\models\ProjectDataType;
use app\models\Indicator;

/**
 * This is the model class for table "project_data".
 *
 * @property int $id
 * @property int $project_data_type_id Target or Milestone
 * @property int $indicator_id
 * @property string $value_date date data is collected
 * @property float $value value of data collected
 * @property string $data_comment Comment on data collected
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Indicator $indicator
 * @property ProjectDataType $projectDataType
 */
class ProjectData extends \yii\db\ActiveRecord
{   
    public $dataformat;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_data';
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
            [['project_data_type_id', 'indicator_id', 'value_date', 'value', 'data_comment'], 'required'],
            [['project_data_type_id', 'indicator_id'], 'integer'],
            [['value_date'], 'safe'],
            [['value'], 'number'],
            [['data_comment'], 'string', 'max' => 1000],
            [['indicator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Indicator::className(), 'targetAttribute' => ['indicator_id' => 'id']],
            [['project_data_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectDataType::className(), 'targetAttribute' => ['project_data_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_data_type_id' => 'Date Type',
            'indicator_id' => 'Indicator',
            'indicatorFormat.format' => 'Data Format',
            'value_date' => 'Collection Date',
            'value' => 'Data value',
            'data_comment' => 'Comment',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    
    /*
     * Get Indicator List
     * */

    public function getIndicatorList(){
        $rows = Indicator::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','indicator_name');

        return $rowdata;
    }

    /*
     * Get Project Data Type List
     * */

    public function getProjectDataTypeList(){
        $rows = ProjectDataType::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','type');

        return $rowdata;
    }
    
    /**
     * Gets query for [[Indicator Data Format]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorFormat()
    {
        return $this->hasOne(IndicatorFormat::className(), ['id' => 'indicator_format_id'])
                    ->via('indicator');
    }

    /**
     * Gets query for [[Indicator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicator()
    {
        return $this->hasOne(Indicator::className(), ['id' => 'indicator_id']);
    }

    /**
     * Gets query for [[ProjectDataType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectDataType()
    {
        return $this->hasOne(ProjectDataType::className(), ['id' => 'project_data_type_id']);
    }
}
