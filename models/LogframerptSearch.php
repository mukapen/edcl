<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Logframerpt;

/**
 * LogframerptSearch represents the model behind the search form of `app\models\Logframerpt`.
 */

class LogframerptSearch extends Logframerpt
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {   
        //define searchable columns
        return [
            [['projectID', 'indicatorID', 'subIndicatorID'], 'integer'],
            [['projectCode', 'projectTitle', 'startDate', 'endDate', 'Indicator', 'indicaterCategory', 'subIndicator', 'mDate', 'milestone'], 'safe'],
            [['startDate', 'endDate', 'baselineDate', 'midtermDate', 'evaluationDate', 'mDate'], 'safe'],
            [['projectCode', 'projectTitle', 'indicaterCategory', 'subIndicator', 'subDescription', 'baselineValue', 'midtermValue', 'targetValue', 'endtermValue', 'milestone'], 'safe'],
            [['projectDescription', 'Indicator', 'descripton'], 'safe'],
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
        $query = Logframerpt::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'subIndicatorID' => $this->subIndicatorID
        ]);

        $query->andFilterWhere(['like', 'projectCode', $this->projectCode])
              ->andFilterWhere(['like', 'Indicator', $this->Indicator]);
             
        return $dataProvider;
    }
}
