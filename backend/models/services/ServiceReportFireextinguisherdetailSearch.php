<?php

namespace backend\models\services;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\services\ServiceReportFireextinguisherdetail;

/**
 * ServiceReportFireextinguisherdetailSearch represents the model behind the search form about `backend\models\services\ServiceReportFireextinguisherdetail`.
 */
class ServiceReportFireextinguisherdetailSearch extends ServiceReportFireextinguisherdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_service_report_dire_extinguisher_detail', 'id_service_report_fire_extinguisher', 'id_technician', 'id_contract_service_type', 'id_products_category', 'qty', 'description', 'id_serial', 'ok', 'not_ok', 'other'], 'integer'],
            [['location', 'last_t_date', 'retest', 'hydrotest', 'remarks', 'status', 'created_date'], 'safe'],
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
        $query = ServiceReportFireextinguisherdetail::find();

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
            'id_service_report_dire_extinguisher_detail' => $this->id_service_report_dire_extinguisher_detail,
            'id_service_report_fire_extinguisher' => $this->id_service_report_fire_extinguisher,
            'id_technician' => $this->id_technician,
            'id_contract_service_type' => $this->id_contract_service_type,
            'id_products_category' => $this->id_products_category,
            'qty' => $this->qty,
            'description' => $this->description,
            'id_serial' => $this->id_serial,
            'last_t_date' => $this->last_t_date,
            'retest' => $this->retest,
            'hydrotest' => $this->hydrotest,
            'ok' => $this->ok,
            'not_ok' => $this->not_ok,
            'other' => $this->other,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
