<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract_services_status".
 *
 * @property integer $id_contract_services_status
 * @property string $contract_services_status
 */
class ContractServicesStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_services_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_services_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract_services_status' => 'Id Contract Services Status',
            'contract_services_status' => 'Contract Services Status',
        ];
    }
}
