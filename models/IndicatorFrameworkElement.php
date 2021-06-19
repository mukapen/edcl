<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior; // auto-populate updated_by and created_by fields with current UserID
use yii\behaviors\TimestampBehavior; // auto populate updated_at and created_at fields with current timestamp
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use app\models\Project;
use app\models\IndicatorCategory;

/**
 * This is the model class for table "indicator_framework_element".
 *
 * @property int $id
 * @property int $project_id
 * @property int $indicator_category_id
 * @property string $element Framework Element Name like Output1, Input 2
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property IndicatorCategory $indicatorCategory
 */
class IndicatorFrameworkElement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicator_framework_element';
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
            [['project_id', 'indicator_category_id', 'element'], 'required'],
            [['project_id', 'indicator_category_id'], 'integer'],
            [['element', 'description'], 'string', 'max' => 1000],
            [['indicator_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => IndicatorCategory::className(), 'targetAttribute' => ['indicator_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project Code',
            'indicator_category_id' => 'Indicator Category',
            'indicatorCategory.category_name' => 'Category',
            'element' => 'Element',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    
    /*
     * Get Projects List
     * */

    public function getProjectsList(){
        $rows = Project::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','project_title');

        return $rowdata;
    } 

    /*
     * Get Indicator Category List
     * */

    public function getIndicatorCategoryList(){
        $rows = IndicatorCategory::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','category_name');

        return $rowdata;
    } 
    
    /**
     * Gets query for [[Indicators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicators()
    {
        return $this->hasMany(Indicator::className(), ['indicator_framework_element_id' => 'id']);
    }

     /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * Gets query for [[IndicatorCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorCategory()
    {
        return $this->hasOne(IndicatorCategory::className(), ['id' => 'indicator_category_id']);
    }
}
