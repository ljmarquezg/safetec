<?php

namespace backend\models\contract;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\contract\ContractServicesPeriod;

/**
 * ContractServicesPeriodSearch represents the model behind the search form about `backend\models\contract\ContractServicesPeriod`.
 */
class ContractServicesPeriodSearch extends ContractServicesPeriod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract_services_period', 'contract_service_period_month', 'contract_services_expire'], 'integer'],
            [['contract_services_period'], 'safe'],
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
        $query = ContractServicesPeriod::find();

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
            'id_contract_services_period' => $this->id_contract_services_period,
            'contract_service_period_month' => $this->contract_service_period_month,
            'contract_services_expire' => $this->contract_services_expire,
        ]);

        $query->andFilterWhere(['like', 'contract_services_period', $this->contract_services_period]);

        return $dataProvider;
    }
}
