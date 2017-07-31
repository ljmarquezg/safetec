<?php

namespace backend\models\services;

use Yii;

/**
 * This is the model class for table "service_report_fireextinguisher".
 *
 * @property integer $id_service_report_fire_extinguisher
 * @property integer $id_customer
 * @property integer $id_customer_division
 * @property integer $id_employees
 * @property integer $id_services_type
 * @property string $service_report_number
 * @property string $service_report_date
 * @property integer $id_contract
 * @property string $remarks
 * @property string $created_date
 */
class ServiceReportFireextinguisher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_report_fireextinguisher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_service_report_fire_extinguisher', 'id_employees', 'created_date'], 'required'],
            [['id_service_report_fire_extinguisher', 'id_customer', 'id_customer_division', 'id_employees', 'id_services_type', 'id_contract'], 'integer'],
            [['service_report_date', 'created_date'], 'safe'],
            [['service_report_number', 'remarks'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_service_report_fire_extinguisher' => 'Id Service Report Fire Extinguisher',
            'id_customer' => 'Id Customer',
            'id_customer_division' => 'Id Customer Division',
            'id_employees' => 'Id Employees',
            'id_services_type' => 'Id Services Type',
            'service_report_number' => 'Service Report Number',
            'service_report_date' => 'Service Report Date',
            'id_contract' => 'Id Contract',
            'remarks' => 'Remarks',
            'created_date' => 'Created Date',
        ];
    }
}
