<?php

namespace backend\models\attendance;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\attendance\AttendanceType;

/**
 * AttendanceTypeSearch represents the model behind the search form about `backend\models\attendance\AttendanceType`.
 */
class AttendanceTypeSearch extends AttendanceType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_attendance_type'], 'integer'],
            [['attendance_description'], 'safe'],
            [['attendance_value'], 'number'],
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
        $query = AttendanceType::find();

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
            'id_attendance_type' => $this->id_attendance_type,
            'attendance_value' => $this->attendance_value,
        ]);

        $query->andFilterWhere(['like', 'attendance_description', $this->attendance_description]);

        return $dataProvider;
    }
}
