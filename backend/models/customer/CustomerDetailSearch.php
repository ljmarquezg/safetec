<?php

namespace backend\models\customer;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\customer\CustomerDetail;

/**
 * CustomerDetailSearch represents the model behind the search form about `backend\models\customer\CustomerDetail`.
 */
class CustomerDetailSearch extends CustomerDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer_detail', 'id_customer', 'id_customer_branch', 'id_customer_detail_type'], 'integer'],
            [['customer_detail_value'], 'safe'],
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
        $query = CustomerDetail::find();

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
            'id_customer_detail' => $this->id_customer_detail,
            'id_customer' => $this->id_customer,
            'id_customer_branch' => $this->id_customer_branch,
            'id_customer_detail_type' => $this->id_customer_detail_type,
        ]);

        $query->andFilterWhere(['like', 'customer_detail_value', $this->customer_detail_value]);

        return $dataProvider;
    }
}
