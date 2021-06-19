<?php


namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $projectID
 * @property int $statusID
 * @property string $Code
 * @property string $Title
 * @property string $sDate Project Start Date
 * @property string $eDate Project End Date
 * @property string|null $Description
 * @property string|null $bDate Baseline survey date
 * @property string|null $mDate Mid term survey date
 * @property string|null $pDate Post implementation survey date
 *
 * @property Projectstatus $status
 * @property Projectpartner[] $projectpartners
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['statusID', 'Code', 'Title', 'sDate', 'eDate'], 'required'],
            [['statusID'], 'integer'],
            [['sDate', 'eDate', 'bDate', 'mDate', 'pDate'], 'safe'],
            [['Code', 'Title'], 'string', 'max' => 500],
            [['Description'], 'string', 'max' => 1000],
            [['statusID'], 'exist', 'skipOnError' => true, 'targetClass' => Projectstatus::className(), 'targetAttribute' => ['statusID' => 'statusID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'projectID' => 'Project ID',
            'statusID' => 'Status ID',
            'Code' => 'Code',
            'Title' => 'Title',
            'sDate' => 'Project Start Date',
            'eDate' => 'Project End Date',
            'Description' => 'Description',
            'bDate' => 'Baseline survey date',
            'mDate' => 'Mid term survey date',
            'pDate' => 'Post implementation survey date',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Projectstatus::className(), ['statusID' => 'statusID']);
    }

    /**
     * Gets query for [[Projectpartners]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectpartners()
    {
        return $this->hasMany(Projectpartner::className(), ['projectID' => 'projectID']);
    }
}
