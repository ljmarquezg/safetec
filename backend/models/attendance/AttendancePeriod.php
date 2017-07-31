<?php

namespace backend\models\attendance;

use Yii;

/**
 * This is the model class for table "attendance_period".
 *
 * @property integer $Attendance_Period_ID
 * @property integer $Employee_ID
 * @property double $Vacations
 * @property double $SickLeave
 * @property double $Casual
 * @property double $Breavement
 * @property string $Start_Period
 * @property string $End_Period
 */
class AttendancePeriod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance_period';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Attendance_Period_ID'], 'required'],
            [['Attendance_Period_ID', 'Employee_ID'], 'integer'],
            [['Vacations', 'SickLeave', 'Casual', 'Breavement'], 'number'],
            [['Start_Period', 'End_Period'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Attendance_Period_ID' => 'Attendance  Period  ID',
            'Employee_ID' => 'Employee  ID',
            'Vacations' => 'Vacations',
            'SickLeave' => 'Sick Leave',
            'Casual' => 'Casual',
            'Breavement' => 'Breavement',
            'Start_Period' => 'Start  Period',
            'End_Period' => 'End  Period',
        ];
    }
}
