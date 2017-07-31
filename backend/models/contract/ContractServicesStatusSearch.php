<?php

namespace backend\models\contract;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\contract\ContractServicesStatus;

/**
 * ContractServicesStatusSearch represents the model behind the search form about `backend\models\contract\ContractServicesStatus`.
 */
class ContractServicesStatusSearch extends ContractServicesStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract_services_status'], 'integer'],
            [['contract_services_status'], 'safe'],
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
        $query = ContractServicesStatus::find();

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
            'id_contract_services_status' => $this->id_contract_services_status,
        ]);

        $query->andFilterWhere(['like', 'contract_services_status', $this->contract_services_status]);

        return $dataProvider;
    }
}
