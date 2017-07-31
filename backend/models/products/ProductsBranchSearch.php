<?php

namespace backend\models\products;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\products\ProductsBranch;

/**
 * ProductsBranchSearch represents the model behind the search form about `backend\models\products\ProductsBranch`.
 */
class ProductsBranchSearch extends ProductsBranch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products_brand'], 'integer'],
            [['products_brand_description', 'product_brand_status'], 'safe'],
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
        $query = ProductsBranch::find();

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
            'id_products_brand' => $this->id_products_brand,
        ]);

        $query->andFilterWhere(['like', 'products_brand_description', $this->products_brand_description])
            ->andFilterWhere(['like', 'product_brand_status', $this->product_brand_status]);

        return $dataProvider;
    }
}
