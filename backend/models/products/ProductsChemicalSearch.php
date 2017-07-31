<?php

namespace backend\models\products;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\products\ProductsChemical;

/**
 * ProductsChemicalSearch represents the model behind the search form about `backend\models\products\ProductsChemical`.
 */
class ProductsChemicalSearch extends ProductsChemical
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products_chemical'], 'integer'],
            [['products_chemical_description'], 'safe'],
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
        $query = ProductsChemical::find();

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
            'id_products_chemical' => $this->id_products_chemical,
        ]);

        $query->andFilterWhere(['like', 'products_chemical_description', $this->products_chemical_description]);

        return $dataProvider;
    }
}
