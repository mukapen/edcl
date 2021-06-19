<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projectpartner;

/**
 * ProjectpartnerSearch represents the model behind the search form of `app\models\Projectpartner`.
 */
class ProjectpartnerSearch extends Projectpartner
{
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {   
        // add related fields to searchable attributes. add Project table fields to searchable attributes
        return array_merge(parent::attributes(), ['project.project_code']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {   
        //define searchable columns
        return [
            [['organization_name', 'role', 'project.project_code'], 'safe'],
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
        $query = ProjectPartner::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('project'); // join with relation {Project} table 
                                                 //Link Project Partner and Project tables

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

        $query->andFilterWhere(['like', 'organization_name', $this->organization_name])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'organization_address', $this->organization_address])
            ->andFilterWhere(['like', 'project.project_code', $this->getAttribute('project.project_code')]);
        
        //grid sorting for the related column: project.Code
        $dataProvider->sort->attributes['project.project_code'] = [
            'asc' => ['project.project_code' => SORT_ASC],
            'desc' => ['project.project_code' => SORT_DESC],
        ];

        //grid default sort order
        //$dataProvider->sort->defaultorder = ['project.Code' => SORT_ASC];

        return $dataProvider;
    }
}
