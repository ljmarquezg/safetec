<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract_services_expired".
 *
 * @property integer $id_contract_services
 * @property integer $id_contract
 * @property integer $id_contract_services_description
 * @property string $last_service
 * @property string $next_service
 * @property integer $qty
 * @property string $description
 * @property double $cost
 * @property integer $id_contract_services_period
 * @property double $total
 * @property integer $contract_services_status
 */
class ContractServicesExpired extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_services_expired';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract_services', 'id_contract', 'id_contract_services_description', 'qty', 'id_contract_services_period', 'contract_services_status'], 'integer'],
            [['last_service', 'next_service'], 'safe'],
            [['cost', 'total'], 'number'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract_services' => 'Id Contract Services',
            'id_contract' => 'Id Contract',
            'id_contract_services_description' => 'Id Contract Services Description',
            'last_service' => 'Last Service',
            'next_service' => 'Next Service',
            'qty' => 'Qty',
            'description' => 'Description',
            'cost' => 'Cost',
            'id_contract_services_period' => 'Id Contract Services Period',
            'total' => 'Total',
            'contract_services_status' => 'Contract Services Status',
        ];
    }
}
