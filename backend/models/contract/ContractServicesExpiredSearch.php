<?php

namespace backend\models\contract;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\contract\ContractServicesExpired;

/**
 * ContractServicesExpiredSearch represents the model behind the search form about `backend\models\contract\ContractServicesExpired`.
 */
class ContractServicesExpiredSearch extends ContractServicesExpired
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract_services', 'id_contract', 'id_contract_services_description', 'qty', 'id_contract_services_period', 'contract_services_status'], 'integer'],
            [['last_service', 'next_service', 'description'], 'safe'],
            [['cost', 'total'], 'number'],
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
        $query = ContractServicesExpired::find();

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
            'id_contract_services' => $this->id_contract_services,
            'id_contract' => $this->id_contract,
            'id_contract_services_description' => $this->id_contract_services_description,
            'last_service' => $this->last_service,
            'next_service' => $this->next_service,
            'qty' => $this->qty,
            'cost' => $this->cost,
            'id_contract_services_period' => $this->id_contract_services_period,
            'total' => $this->total,
            'contract_services_status' => $this->contract_services_status,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
