<?php

namespace backend\models\products;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\products\Products;

/**
 * ProductsSearch represents the model behind the search form about `backend\models\products\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products', 'id_products_measure_unit', 'id_products_brand', 'id_product_service', 'id_produdcts_status', 'retest', 'hydrotest', 'id_products_chemical'], 'integer'],
            [['products_description', 'id_products_category', 'products_capacity'], 'safe'],
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
        $query = Products::find();

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
            'id_products' => $this->id_products,
            'id_products_measure_unit' => $this->id_products_measure_unit,
            'id_products_brand' => $this->id_products_brand,
            'id_product_service' => $this->id_product_service,
            'id_produdcts_status' => $this->id_produdcts_status,
            'retest' => $this->retest,
            'hydrotest' => $this->hydrotest,
            'id_products_chemical' => $this->id_products_chemical,
        ]);

        $query->andFilterWhere(['like', 'products_description', $this->products_description])
            ->andFilterWhere(['like', 'id_products_category', $this->id_products_category])
            ->andFilterWhere(['like', 'products_capacity', $this->products_capacity]);

        return $dataProvider;
    }
}
