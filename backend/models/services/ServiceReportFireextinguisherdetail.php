<?php

namespace backend\models\services;

use Yii;

/**
 * This is the model class for table "service_report_fireextinguisherdetail".
 *
 * @property integer $id_service_report_dire_extinguisher_detail
 * @property integer $id_service_report_fire_extinguisher
 * @property integer $id_technician
 * @property integer $id_contract_service_type
 * @property integer $id_products_category
 * @property integer $qty
 * @property integer $description
 * @property integer $id_serial
 * @property string $location
 * @property string $last_t_date
 * @property string $retest
 * @property string $hydrotest
 * @property integer $ok
 * @property integer $not_ok
 * @property integer $other
 * @property string $remarks
 * @property string $status
 * @property string $created_date
 */
class ServiceReportFireextinguisherdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_report_fireextinguisherdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_service_report_dire_extinguisher_detail', 'id_serial', 'ok', 'not_ok', 'other', 'created_date'], 'required'],
            [['id_service_report_dire_extinguisher_detail', 'id_service_report_fire_extinguisher', 'id_technician', 'id_contract_service_type', 'id_products_category', 'qty', 'description', 'id_serial', 'ok', 'not_ok', 'other'], 'integer'],
            [['last_t_date', 'retest', 'hydrotest', 'created_date'], 'safe'],
            [['location', 'remarks', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_service_report_dire_extinguisher_detail' => 'Id Service Report Dire Extinguisher Detail',
            'id_service_report_fire_extinguisher' => 'Id Service Report Fire Extinguisher',
            'id_technician' => 'Id Technician',
            'id_contract_service_type' => 'Id Contract Service Type',
            'id_products_category' => 'Id Products Category',
            'qty' => 'Qty',
            'description' => 'Description',
            'id_serial' => 'Id Serial',
            'location' => 'Location',
            'last_t_date' => 'Last T Date',
            'retest' => 'Retest',
            'hydrotest' => 'Hydrotest',
            'ok' => 'Ok',
            'not_ok' => 'Not Ok',
            'other' => 'Other',
            'remarks' => 'Remarks',
            'status' => 'Status',
            'created_date' => 'Created Date',
        ];
    }
}
