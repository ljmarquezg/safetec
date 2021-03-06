<?php

namespace backend\models\customer;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\customer\CustomerStatus;

/**
 * CustomerStatusSearch represents the model behind the search form about `backend\models\customer\CustomerStatus`.
 */
class CustomerStatusSearch extends CustomerStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status'], 'integer'],
            [['status_description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = CustomerStatus::find();

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
            'id_status' => $this->id_status,
        ]);

        $query->andFilterWhere(['like', 'status_description', $this->status_description]);

        return $dataProvider;
    }
}
