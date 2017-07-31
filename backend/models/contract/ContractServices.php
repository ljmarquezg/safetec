<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract_services".
 *
 * @property integer $id_contract_service
 * @property integer $id_customer
 * @property integer $id_customer_branch
 * @property integer $id_contract
 * @property integer $id_contract_services_description
 * @property string $contract_services_start
 * @property string $contract_services_expire
 * @property string $last_service
 * @property string $next_service
 * @property integer $qty
 * @property string $description
 * @property double $cost
 * @property integer $id_contract_services_period
 * @property double $total
 * @property integer $id_contract_services_status
 * @property string $purchace_order
 *
 * @property CustomerBranch $customerBranch
 */
class ContractServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_contract_services_status', 'id_customer_branch', 'id_contract', 'contract_services_start', 'contract_services_expire', 'id_contract_services_status'], 'required'],
            [['id_customer', 'id_customer_branch', 'id_contract', 'id_contract_services_description', 'qty', 'id_contract_services_period', 'id_contract_services_status'], 'integer'],
            [['contract_services_start', 'contract_services_expire', 'last_service', 'next_service'], 'safe'],
            [['cost', 'total'], 'number'],
            [['description', 'purchace_order'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract_service' => 'Id Contract Service',
            'id_customer' => 'Customer',
            'id_customer_branch' => 'Branch',
            'id_contract' => 'Contract number',
            'purchace_order' => 'Purchace Order',
            'contract_services_start' => 'Contract Services Start',
            'contract_services_expire' => 'Contract Services Expire',
            'last_service' => 'Last Service',
            'next_service' => 'Next Service',
            'qty' => 'Qty',
            'description' => 'Description',
            'cost' => 'Cost',
            'id_contract_services_period' => 'Contract Period',
            'total' => 'Total',
            'id_contract_services_status' => 'Status',
            'id_contract_services_description' => 'Remarks',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerBranch()
    {
        return $this->hasOne(CustomerBranch::className(), ['id_customer_branch' => 'id_customer_branch']);
    }
}
