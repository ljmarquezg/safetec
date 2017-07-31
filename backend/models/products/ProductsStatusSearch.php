<?php

namespace backend\models\products;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\products\ProductsStatus;

/**
 * ProductsStatusSearch represents the model behind the search form about `backend\models\products\ProductsStatus`.
 */
class ProductsStatusSearch extends ProductsStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product_status'], 'integer'],
            [['description'], 'safe'],
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
        $query = ProductsStatus::find();

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
            'id_product_status' => $this->id_product_status,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
