<?php

namespace backend\models\attendance;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\attendance\AttendancePeriod;

/**
 * AttendancePeriodSearch represents the model behind the search form about `backend\models\attendance\AttendancePeriod`.
 */
class AttendancePeriodSearch extends AttendancePeriod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_attendance_period', 'id_employees'], 'integer'],
            [['vacations', 'sickLeave', 'casual', 'breavement'], 'number'],
            [['start_period', 'end_period', 'created_date'], 'safe'],
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
        $query = AttendancePeriod::find();

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
            'id_attendance_period' => $this->id_attendance_period,
            'id_employees' => $this->id_employees,
            'vacations' => $this->vacations,
            'sickLeave' => $this->sickLeave,
            'casual' => $this->casual,
            'breavement' => $this->breavement,
            'start_period' => $this->start_period,
            'end_period' => $this->end_period,
            'created_date' => $this->created_date,
        ]);

        return $dataProvider;
    }
}
