<?php

namespace backend\models\attendance;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\attendance\Attendance;

/**
 * AttendanceSearch represents the model behind the search form about `backend\models\attendance\Attendance`.
 */
class AttendanceSearch extends Attendance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_attendance', 'id_employees', 'id_attendance_type'], 'integer'],
            [['attendance_startdate', 'attendance_enddate', 'remarks', 'created_date'], 'safe'],
            [['total_days', 'vacation', 'sickleave', 'casual', 'bereavement', 'nocontact', 'late', 'other'], 'number'],
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
        $query = Attendance::find();

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
            'id_attendance' => $this->id_attendance,
            'id_employees' => $this->id_employees,
            'attendance_startdate' => $this->attendance_startdate,
            'attendance_enddate' => $this->attendance_enddate,
            'id_attendance_type' => $this->id_attendance_type,
            'total_days' => $this->total_days,
            'vacation' => $this->vacation,
            'sickleave' => $this->sickleave,
            'casual' => $this->casual,
            'bereavement' => $this->bereavement,
            'nocontact' => $this->nocontact,
            'late' => $this->late,
            'other' => $this->other,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
