<?php

namespace backend\models\services;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\services\ServicesType;

/**
 * ServicesTypeSearch represents the model behind the search form about `backend\models\services\ServicesType`.
 */
class ServicesTypeSearch extends ServicesType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_services'], 'integer'],
            [['services_description'], 'safe'],
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
        $query = ServicesType::find();

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
            'id_services' => $this->id_services,
        ]);

        $query->andFilterWhere(['like', 'services_description', $this->services_description]);

        return $dataProvider;
    }
}
