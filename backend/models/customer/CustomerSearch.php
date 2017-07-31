<?php

namespace backend\models\customer;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\customer\Customer;

/**
 * CustomerSearch represents the model behind the search form about `backend\models\customer\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_customer_status', 'customer_status'], 'integer'],
            [['customer_name', 'customer_address', 'customer_address2', 'customer_contact', 'customer_country', 'customer_state', 'customer_zip', 'customer_zone', 'customer_created', 'customer_phone', 'customer_fax', 'customer_email', 'image'], 'safe'],
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
        $query = Customer::find();

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
            'id_customer' => $this->id_customer,
            'customer_created' => $this->customer_created,
            'id_customer_status' => $this->id_customer_status,
            'customer_status' => $this->customer_status,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_address', $this->customer_address])
            ->andFilterWhere(['like', 'customer_address2', $this->customer_address2])
            ->andFilterWhere(['like', 'customer_contact', $this->customer_contact])
            ->andFilterWhere(['like', 'customer_country', $this->customer_country])
            ->andFilterWhere(['like', 'customer_state', $this->customer_state])
            ->andFilterWhere(['like', 'customer_zip', $this->customer_zip])
            ->andFilterWhere(['like', 'customer_zone', $this->customer_zone])
            ->andFilterWhere(['like', 'customer_phone', $this->customer_phone])
            ->andFilterWhere(['like', 'customer_fax', $this->customer_fax])
            ->andFilterWhere(['like', 'customer_email', $this->customer_email])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
