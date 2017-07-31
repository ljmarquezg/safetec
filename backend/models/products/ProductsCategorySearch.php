<?php

namespace backend\models\products;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\products\ProductsCategory;

/**
 * ProductsCategorySearch represents the model behind the search form about `backend\models\products\ProductsCategory`.
 */
class ProductsCategorySearch extends ProductsCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products_category', 'product_category_status'], 'integer'],
            [['products_category_description'], 'safe'],
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
        $query = ProductsCategory::find();

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
            'id_products_category' => $this->id_products_category,
            'product_category_status' => $this->product_category_status,
        ]);

        $query->andFilterWhere(['like', 'products_category_description', $this->products_category_description]);

        return $dataProvider;
    }
}
