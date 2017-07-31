<?php

namespace backend\models\attendance;

use Yii;

/**
 * This is the model class for table "attendance_type".
 *
 * @property integer $id_attendandce_type
 * @property string $attendance_description
 * @property double $attendance_value
 *
 * @property Attendance[] $attendances
 */
class AttendanceType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attendance_description'], 'required'],
            [['attendance_value'], 'number'],
            [['attendance_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_attendance_type' => 'Id Attendance Type',
            'attendance_description' => 'Description',
            'attendance_value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['attendance_type' => 'id_attendandce_type']);
    }
}
