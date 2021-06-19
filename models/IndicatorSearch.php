<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Indicator;

/**
 * IndicatorSearch represents the model behind the search form of `app\models\Indicator`.
 */
class IndicatorSearch extends Indicator
{   

     /**
     * {@inheritdoc}
     */
    public function attributes()
    {   
        // add related fields to searchable attributes. add {Period}, {Indicator_format} {Indicator_Framework_Element} tables fields to search
        return array_merge(parent::attributes(), ['dataPeriod.period_name','indicatorFormat.format', 'indicatorFrameworkElement.element']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'indicator_framework_element_id', 'indicator_format_id', 'data_period_id', 'is_kpi'], 'integer'],
            [['indicator_name', 'description', 'baseline_date', 'midline_date', 'endline_date', 'unit', 'indicator_comment', 'risk_assumption', 'dataPeriod.period_name','indicatorFormat.format', 'indicatorFrameworkElement.element'], 'safe'],
            [['baseline_value', 'midline_value', 'target_value', 'endline_value'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Indicator::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
      
        // Declare join relation with {Period}, {Indicator_format} {Indicator_Framework_Element} tables
        $query->joinWith('dataPeriod');
        $query->joinWith('indicatorFormat');
        $query->joinWith('indicatorFrameworkElement');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'indicator_name', $this->indicator_name])
            ->andFilterWhere(['like', 'indicator.description', $this->description])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'indicator_comment', $this->indicator_comment])
            ->andFilterWhere(['like', 'risk_assumption', $this->risk_assumption])
            ->andFilterWhere(['=', 'baseline_value', $this->baseline_value])
            ->andFilterWhere(['=', 'is_kpi', $this->is_kpi])
            ->andFilterWhere(['=', 'midline_value', $this->midline_value])
            ->andFilterWhere(['=', 'target_value', $this->target_value])
            ->andFilterWhere(['=', 'endline_value', $this->endline_value])
            ->andFilterWhere(['like', 'period.period_name', $this->getAttribute('dataPeriod.period_name')])
            ->andFilterWhere(['like', 'indicator_format.format', $this->getAttribute('indicatorFormat.format')])
            ->andFilterWhere(['like', 'indicator_framework_element.element', $this->getAttribute('indicatorFrameworkElement.element')]);
        
        //enable grid sorting for the related column: [period.period_name] [indicator_format.format] [indicator_framework_element.element]
        $dataProvider->sort->attributes['dataPeriod.period_name'] = [
            'asc' => ['period.period_name' => SORT_ASC],
            'desc' => ['period.period_name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['indicatorFormat.format'] = [
            'asc' => ['indicator_format.format' => SORT_ASC],
            'desc' => ['indicator_format.format' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['indicatorFrameworkElement.element'] = [
            'asc' => ['indicator_framework_element.element' => SORT_ASC],
            'desc' => ['indicator_framework_element.element' => SORT_DESC],
        ];

        //default order of sorting
        //$dataProvider->sort->defaultOrder = ['author.name' => SORT_ASC];

        return $dataProvider;
    }
}
