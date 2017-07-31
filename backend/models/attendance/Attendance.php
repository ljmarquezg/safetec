<?php

namespace backend\models\attendance;

use Yii;
use backend\models\employees\Employees;
/**
 * This is the model class for table "attendance".
 *
 * @property integer $id_attendance
 * @property integer $id_employees
 * @property string $attendance_startdate
 * @property string $attendance_enddate
 * @property integer $id_attendance_type
 * @property double $total_days
 * @property double $vacation
 * @property double $sickleave
 * @property double $casual
 * @property double $bereavement
 * @property double $nocontact
 * @property double $late
 * @property double $other
 * @property string $remarks
 * @property string $created_date
 *
 * @property AttendanceType $attendanceType
 * @property Employees $idEployees
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_attendance_type'], 'integer'],
            [['attendance_startdate', 'attendance_enddate', 'id_employees', 'id_attendance_type'], 'required'],
            [['created_date', 'updated_date'],'safe'],
            [['total_days', 'vacation', 'sickleave', 'casual', 'bereavement', 'nocontact', 'late', 'other'], 'number'],
            [['remarks'], 'string', 'max' => 255],
            [['id_attendance_type'], 'exist', 'skipOnError' => true, 'targetClass' => AttendanceType::className(), 'targetAttribute' => ['id_attendance_type' => 'id_attendance_type']],
            [['id_employees'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['id_employees' => 'id_employees']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_attendance' => 'Id Attendance',
            'id_employees' => 'Eployee',
            'attendance_startdate' => 'Attendance star tdate',
            'attendance_enddate' => 'Attendance final date',
            'id_attendance_type' => 'Attendance type',
            'total_days' => 'Total Days',
            'vacation' => 'Vacation',
            'sickleave' => 'Sickleave',
            'casual' => 'Casual',
            'bereavement' => 'Bereavement',
            'nocontact' => 'Nocontact',
            'late' => 'Late',
            'other' => 'Other',
            'remarks' => 'Remarks',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendanceType()
    {
        return $this->hasOne(AttendanceType::className(), ['id_attendance_type' => 'id_attendance_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEployees()
    {
        return $this->hasOne(Employees::className(), ['id_employees' => 'id_employees']);
    }
}
