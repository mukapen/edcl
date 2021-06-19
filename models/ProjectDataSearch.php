<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectData;

/**
 * ProjectDataSearch represents the model behind the search form of `app\models\ProjectData`.
 */
class ProjectDataSearch extends ProjectData
{   
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {   
        // add related fields to searchable attributes. add {project_data_type}, {Indicator} tables fields to search
        return array_merge(parent::attributes(), ['projectDataType.type','indicator.indicator_name', 'indicatorFormat.format']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_data_type_id', 'indicator_id'], 'integer'],
            [['data_comment', 'projectDataType.type', 'indicator.indicator_name', 'indicatorFormat.format'], 'safe'],
            [['value'], 'number'],
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
        $query = ProjectData::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        // Declare join relation with {project_data_type}, {Indicator} tables
        $query->joinWith('indicator');
        $query->joinWith('projectDataType');
        $query->joinWith('indicatorFormat');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['=', 'value', $this->value])
            ->andFilterWhere(['like', 'project_data_type.type',  $this->getAttribute('projectDataType.type')])
            ->andFilterWhere(['like', 'indicator.indicator_name',  $this->getAttribute('indicator.indicator_name')])
            ->andFilterWhere(['like', 'indicator_format.format',  $this->getAttribute('indicatorFormat.format')]);
        
        //enable grid sorting for the related column: [project_data_type.type] [indicator.indicator_name]
        $dataProvider->sort->attributes['projectDataType.type'] = [
            'asc' => ['project_data_type.type' => SORT_ASC],
            'desc' => ['project_data_type.type' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['indicator.indicator_name'] = [
            'asc' => ['indicator.indicator_name' => SORT_ASC],
            'desc' => ['indicator.indicator_name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['indicatorFormat.format'] = [
            'asc' => ['indicator_format.format' => SORT_ASC],
            'desc' => ['indicator_format.format' => SORT_DESC],
        ];

        //default order of sorting
        //$dataProvider->sort->defaultOrder = ['author.name' => SORT_ASC];

        return $dataProvider;
    }
}
