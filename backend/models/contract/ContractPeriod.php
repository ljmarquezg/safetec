<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract_period".
 *
 * @property integer $id_contract_period
 * @property string $contract_period
 * @property integer $contract_period_month
 */
class ContractPeriod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_period';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_period_month'], 'integer'],
            [['contract_period'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract_period' => 'Id Contract Period',
            'contract_period' => 'Contract Period',
            'contract_period_month' => 'Contract Period Month',
        ];
    }
}
