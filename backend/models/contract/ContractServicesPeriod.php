<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract_services_period".
 *
 * @property integer $id_contract_services_period
 * @property string $contract_services_period
 * @property integer $contract_service_period_month
 * @property integer $contract_services_expire
 */
class ContractServicesPeriod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_services_period';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_service_period_month', 'contract_services_expire'], 'integer'],
            [['contract_services_period'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract_services_period' => 'Id Contract Services Period',
            'contract_services_period' => 'Contract Services Period',
            'contract_service_period_month' => 'Contract Service Period Month',
            'contract_services_expire' => 'Contract Services Expire',
        ];
    }
}
