<?php

namespace backend\models\services;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\services\ServiceReportFireextinguisher;

/**
 * ServiceReportFireextinguisherSearch represents the model behind the search form about `backend\models\services\ServiceReportFireextinguisher`.
 */
class ServiceReportFireextinguisherSearch extends ServiceReportFireextinguisher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_service_report_fire_extinguisher', 'id_customer', 'id_customer_division', 'id_employees', 'id_services_type', 'id_contract'], 'integer'],
            [['service_report_number', 'service_report_date', 'remarks', 'created_date'], 'safe'],
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
        $query = ServiceReportFireextinguisher::find();

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
            'id_service_report_fire_extinguisher' => $this->id_service_report_fire_extinguisher,
            'id_customer' => $this->id_customer,
            'id_customer_division' => $this->id_customer_division,
            'id_employees' => $this->id_employees,
            'id_services_type' => $this->id_services_type,
            'service_report_date' => $this->service_report_date,
            'id_contract' => $this->id_contract,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'service_report_number', $this->service_report_number])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
