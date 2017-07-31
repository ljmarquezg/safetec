<?php

namespace backend\models\services;

use Yii;

/**
 * This is the model class for table "services_control_date".
 *
 * @property integer $id_service_control_date
 * @property integer $id_contract_services
 * @property string $service_control_date_start
 * @property string $service_control_date_expire
 * @property string $service_control_date_status
 * @property string $created_date
 */
class ServicesControlDate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services_control_date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_service_control_date', 'created_date'], 'required'],
            [['id_service_control_date', 'id_contract_services'], 'integer'],
            [['service_control_date_start', 'service_control_date_expire', 'created_date'], 'safe'],
            [['service_control_date_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_service_control_date' => 'Id Service Control Date',
            'id_contract_services' => 'Id Contract Services',
            'service_control_date_start' => 'Service Control Date Start',
            'service_control_date_expire' => 'Service Control Date Expire',
            'service_control_date_status' => 'Service Control Date Status',
            'created_date' => 'Created Date',
        ];
    }
}
