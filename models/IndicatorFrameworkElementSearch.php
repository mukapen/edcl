<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IndicatorFrameworkElement;

/**
 * IndicatorFrameworkElementSearch represents the model behind the search form of `app\models\IndicatorFrameworkElement`.
 */
class IndicatorFrameworkElementSearch extends IndicatorFrameworkElement
{   
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {   
        // add related fields to searchable attributes. add Project table fields to searchable attributes
        return array_merge(parent::attributes(), ['project.project_code', 'indicatorCategory.category_name']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'indicator_category_id'], 'integer'],
            [['element', 'description', 'indicatorCategory.category_name', 'project.project_code'], 'safe'],
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
        $query = IndicatorFrameworkElement::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->joinWith('project'); // join with relation {Project} table 
        $query->joinWith('indicatorCategory'); // join with relation {Indicator_Category} table 
         

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

        $query->andFilterWhere(['like', 'element', $this->element])
            ->andFilterWhere(['like', 'indicator_framework_element.description', $this->description])
            ->andFilterWhere(['like', 'project.project_code', $this->getAttribute('project.project_code')])
            ->andFilterWhere(['like', 'indicator_category.category_name', $this->getAttribute('indicatorCategory.category_name')]);
        
        //grid sorting for the related column: project.Code
        $dataProvider->sort->attributes['project.project_code'] = [
            'asc' => ['project.project_code' => SORT_ASC],
            'desc' => ['project.project_code' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['indicatorCategory.category_name'] = [
            'asc' => ['indicator_category.category_name' => SORT_ASC],
            'desc' => ['indicator_category.category_name' => SORT_DESC],
        ];

        //grid default sort order
        //$dataProvider->sort->defaultorder = ['project.Code' => SORT_ASC];

        return $dataProvider;
    }
}
