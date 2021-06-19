<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectRisk;

/**
 * ProjectRiskSearch represents the model behind the search form of `app\models\ProjectRisk`.
 */
class ProjectRiskSearch extends ProjectRisk
{
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {   
        // add related fields to searchable attributes. add [project] table fields to search
        return array_merge(parent::attributes(), ['project.project_code']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'created_by', 'updated_by'], 'integer'],
            [['risk_code', 'description', 'mitigation', 'project.project_code'], 'safe'],
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
        $query = ProjectRisk::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        // Declare join relation with {Project} table
        $query->joinWith('project');

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

        $query->andFilterWhere(['like', 'risk_code', $this->risk_code])
            ->andFilterWhere(['like', 'project_risk.description', $this->description])
            ->andFilterWhere(['like', 'mitigation', $this->mitigation])
            ->andFilterWhere(['like', 'project.project_code', $this->getAttribute('project.project_code')]);
        
        //enable grid sorting for the related column: [Project_status.project_status_name]
        $dataProvider->sort->attributes['project.project_code'] = [
            'asc' => ['project.project_code' => SORT_ASC],
            'desc' => ['project.project_code' => SORT_DESC],
        ];

        //default order of sorting
        //$dataProvider->sort->defaultOrder = ['author.name' => SORT_ASC];
        
        return $dataProvider;
    }
}
