<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract_status".
 *
 * @property integer $id_contract_status
 * @property string $contract_status
 * @property integer $contract_steps
 */
class ContractStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_steps'], 'integer'],
            [['contract_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract_status' => 'Id Contract Status',
            'contract_status' => 'Contract Status',
            'contract_steps' => 'Contract Steps',
        ];
    }
}
