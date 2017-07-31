<?php

namespace backend\models\customer;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\customer\CustomerBranch;

/**
 * CustomerBranchSearch represents the model behind the search form about `backend\models\customer\CustomerBranch`.
 */
class CustomerBranchSearch extends CustomerBranch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer_branch', 'id_customer', 'id_customer_branch_status'], 'integer'],
            [['customer_branch_name', 'customer_branch_email', 'customer_branch_phone', 'customer_branch_address', 'customer_branch_address2', 'customer_branch_created'], 'safe'],
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
        $query = CustomerBranch::find();

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
            'id_customer_branch' => $this->id_customer_branch,
            'id_customer' => $this->id_customer,
            'customer_branch_created' => $this->customer_branch_created,
            'id_customer_branch_status' => $this->id_customer_branch_status,
        ]);

        $query->andFilterWhere(['like', 'customer_branch_name', $this->customer_branch_name])
            ->andFilterWhere(['like', 'customer_branch_email', $this->customer_branch_email])
            ->andFilterWhere(['like', 'customer_branch_phone', $this->customer_branch_phone])
            ->andFilterWhere(['like', 'customer_branch_address', $this->customer_branch_address])
            ->andFilterWhere(['like', 'customer_branch_address2', $this->customer_branch_address2]);

        return $dataProvider;
    }
}
