<?php

namespace backend\models\contract;

use Yii;

/**
 * This is the model class for table "contract_services_revised".
 *
 * @property integer $ID
 */
class ContractServicesRevised extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract_services_revised';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
        ];
    }
}
