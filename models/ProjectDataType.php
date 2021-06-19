<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_data_type".
 *
 * @property int $id
 * @property string $type
 */
class ProjectDataType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_data_type';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Data Type',
        ];
    }

    /**
     * Gets query for [[ProjectData]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectData()
    {
        return $this->hasMany(ProjectData::className(), ['project_data_type_id' => 'id']);
    }
}
