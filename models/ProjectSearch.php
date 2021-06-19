<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
     /**
     * {@inheritdoc}
     */
    public function attributes()
    {   
        // add related fields to searchable attributes. add [project_status] table fields to search
        return array_merge(parent::attributes(), ['status.project_status_name']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {   
        //only fields in rules() are searchable. Define searchable columns
        return [
            [['budget_amount'], 'number'],
            [['project_code', 'project_title', 'description', 'project_comment','status.project_status_name'], 'safe'],
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
        $query = Project::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Declare join relation with {Project_status} table
        $query->joinWith('status');

        //Load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        
        // Custom filtering criteria. Adjust the query by adding filters
        $query->andFilterWhere(['like', 'project_code', $this->project_code])
            ->andFilterWhere(['like', 'project_title', $this->project_title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'project_status.project_status_name', $this->getAttribute('status.project_status_name')]);
        
        //enable grid sorting for the related column: [Project_status.project_status_name]
        $dataProvider->sort->attributes['status.project_status_name'] = [
            'asc' => ['project_status.project_status_name' => SORT_ASC],
            'desc' => ['project_status.project_status_name' => SORT_DESC],
        ];

        //default order of sorting
        //$dataProvider->sort->defaultOrder = ['author.name' => SORT_ASC];
        
        return $dataProvider;
    }
}
