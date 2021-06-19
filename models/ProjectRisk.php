<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior; // auto-populate updated_by and created_by fields with current UserID
use yii\behaviors\TimestampBehavior; // auto populate updated_at and created_at fields with current timestamp
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use app\models\Project;

/**
 * This is the model class for table "project_risk".
 *
 * @property int $id Risk ID
 * @property int $project_id Project ID
 * @property string $risk_code Project Risk Code
 * @property string|null $description Project Risk Description
 * @property string|null $mitigation Mitigation Measure
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Project $project
 */
class ProjectRisk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_risk';
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
            [['project_id', 'risk_code'], 'required'],
            [['project_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['risk_code', 'description', 'mitigation'], 'string', 'max' => 500],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Risk ID',
            'project_id' => 'Project',
            'risk_code' => 'Risk Code',
            'description' => 'Risk Description',
            'mitigation' => 'Mitigation Measures',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
    
    /*
     * Get Project Status List
     * */

    public function getProjectList(){
        $rows = Project::find()->all();
        $rowdata = ArrayHelper::map($rows,'id','project_title');

        return $rowdata;
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
}
