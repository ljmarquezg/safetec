<?php

namespace backend\models\contract;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\contract\ContractStatus;

/**
 * ContractStatusController represents the model behind the search form about `backend\models\contract\ContractStatus`.
 */
class ContractStatusController extends ContractStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract_status', 'contract_steps'], 'integer'],
            [['contract_status'], 'safe'],
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
        $query = ContractStatus::find();

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
            'id_contract_status' => $this->id_contract_status,
            'contract_steps' => $this->contract_steps,
        ]);

        $query->andFilterWhere(['like', 'contract_status', $this->contract_status]);

        return $dataProvider;
    }
}
