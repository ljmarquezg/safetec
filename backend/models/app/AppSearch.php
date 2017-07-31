<?php

namespace backend\models\app;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\app\App;

/**
 * AppSearch represents the model behind the search form about `backend\models\app\App`.
 */
class AppSearch extends App
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_app'], 'integer'],
            [['company_image', 'user_image', 'customer_image', 'customer_branch_image'], 'safe'],
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
        $query = App::find();

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
            'id_app' => $this->id_app,
        ]);

        $query->andFilterWhere(['like', 'company_image', $this->company_image])
            ->andFilterWhere(['like', 'user_image', $this->user_image])
            ->andFilterWhere(['like', 'customer_image', $this->customer_image])
            ->andFilterWhere(['like', 'customer_branch_image', $this->customer_branch_image]);

        return $dataProvider;
    }
}
