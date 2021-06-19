<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior; // auto-populate updated_by and created_by fields with current UserID
use yii\behaviors\TimestampBehavior; // auto populate updated_at and created_at fields with current timestamp
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "indicator_category".
 *
 * @property int $id
 * @property string $category_name
 * @property string|null $description
 * @property int $display_order
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property IndicatorFrameworkElement[] $indicatorFrameworkElements
 */
class IndicatorCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicator_category';
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
            [['category_name', 'display_order'], 'required'],
            [['display_order'], 'integer'],
            [['category_name'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 1000],
            [['display_order'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'description' => 'Description',
            'display_order' => 'Order',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[IndicatorFrameworkElements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorFrameworkElements()
    {
        return $this->hasMany(IndicatorFrameworkElement::className(), ['indicator_category_id' => 'id']);
    }
}
