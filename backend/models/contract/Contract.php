<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property integer $id_contract
 * @property integer $id_customer
 * @property integer $id_customer_branch
 * @property string $contract_number
 * @property string $contract_start
 * @property string $contract_expire
 * @property string $contract_information
 * @property integer $id_contract_period
 * @property integer $id_contract_status
 * @property string $created_date
 * @property string $purchace_order
 */
class Contract extends \yii\db\ActiveRecord
{
    public $inactive;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_customer_branch', 'id_contract_period', 'id_contract_status', 'id_contract_parent'], 'integer' ],
            [['id_customer', 'id_customer_branch', 'id_contract_period', 'id_contract_status', 'contract_number', 'contract_start', 'contract_expire'], 'required' ], 
            [['contract_start', 'contract_expire', 'created_date', 'contract_updated'], 'safe'],
            [['contract_number', 'contract_information', 'purchace_order'], 'string', 'max' => 255],
            [['contract_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract' => 'Id Contract',
            'id_customer' => 'Customer',
            'id_customer_branch' => 'Customer Division',
            'contract_number' => 'Contract Number',
            'contract_start' => 'Contract Start',
            'contract_expire' => 'Contract Expire',
            'contract_information' => 'Contract Information',
            'id_contract_period' => 'Contract Period',
            'id_contract_status' => 'Contract Status',
            'created_date' => 'Contract Created',
            'purchace_order' => 'Purchace Order',
            'contract_updated'=> 'Contract Updated',
        ];
    }
}
