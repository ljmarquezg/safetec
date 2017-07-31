<?php

namespace backend\models\employees;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\employees\Employees;

/**
 * EmployeesSearch represents the model behind the search form about `backend\models\employees\Employees`.
 */
class EmployeesSearch extends Employees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_employees', 'id_employees_department', 'employees_status'], 'integer'],
            [['employees_name', 'employees_phone', 'employees_email', 'employees_startdate', 'image', 'employees_created'], 'safe'],
            [['employees_vacation', 'employees_sick', 'employees_casual', 'employees_bereavement'], 'number'],
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
        $query = Employees::find();

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
            'id_employees' => $this->id_employees,
            'employees_vacation' => $this->employees_vacation,
            'employees_sick' => $this->employees_sick,
            'employees_casual' => $this->employees_casual,
            'employees_bereavement' => $this->employees_bereavement,
            'employees_startdate' => $this->employees_startdate,
            'id_employees_department' => $this->id_employees_department,
            'employees_status' => $this->employees_status,
            'employees_created' => $this->employees_created,
        ]);

        $query->andFilterWhere(['like', 'employees_name', $this->employees_name])
            ->andFilterWhere(['like', 'employees_phone', $this->employees_phone])
            ->andFilterWhere(['like', 'employees_email', $this->employees_email])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
