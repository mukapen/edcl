<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicator_format".
 *
 * @property int $id
 * @property string $format
 */
class IndicatorFormat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicator_format';
    }
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['format'], 'required'],
            [['format'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'format' => 'Format',
        ];
    }

    /**
     * Gets query for [[Indicators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicators()
    {
        return $this->hasMany(Indicator::className(), ['indicator_format_id' => 'id']);
    }
}
