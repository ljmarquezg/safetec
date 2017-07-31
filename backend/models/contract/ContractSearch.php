<?php

namespace backend\models\contract;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\contract\Contract;

/**
 * ContractSearch represents the model behind the search form about `backend\models\contract\Contract`.
 */
class ContractSearch extends Contract
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract', 'id_customer', 'id_customer_branch', 'id_contract_period', 'id_contract_status'], 'integer'],
            [['contract_number', 'contract_start', 'contract_expire', 'contract_information', 'contract_created', 'purchace_order'], 'safe'],
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
        $query = Contract::find();

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
            'id_contract' => $this->id_contract,
            'id_customer' => $this->id_customer,
            'id_customer_branch' => $this->id_customer_branch,
            'contract_start' => $this->contract_start,
            'contract_expire' => $this->contract_expire,
            'id_contract_period' => $this->id_contract_period,
            'id_contract_status' => $this->id_contract_status,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'contract_number', $this->contract_number])
            ->andFilterWhere(['like', 'contract_information', $this->contract_information])
            ->andFilterWhere(['like', 'purchace_order', $this->purchace_order]);

        return $dataProvider;
    }
}
