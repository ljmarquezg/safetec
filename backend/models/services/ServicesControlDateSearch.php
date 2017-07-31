<?php

namespace backend\models\services;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\services\ServicesControlDate;

/**
 * ServicesControlDateSearch represents the model behind the search form about `backend\models\services\ServicesControlDate`.
 */
class ServicesControlDateSearch extends ServicesControlDate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_service_control_date', 'id_contract_services'], 'integer'],
            [['service_control_date_start', 'service_control_date_expire', 'service_control_date_status', 'created_date'], 'safe'],
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
        $query = ServicesControlDate::find();

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
            'id_service_control_date' => $this->id_service_control_date,
            'id_contract_services' => $this->id_contract_services,
            'service_control_date_start' => $this->service_control_date_start,
            'service_control_date_expire' => $this->service_control_date_expire,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'service_control_date_status', $this->service_control_date_status]);

        return $dataProvider;
    }
}
