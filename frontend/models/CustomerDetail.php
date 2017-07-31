<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "customer_detail".
 *
 * @property integer $id_customer_detail
 * @property integer $id_customer
 * @property integer $id_customer_division
 * @property string $id_customer_detail_type
 * @property integer $customer_detail_value
 */
class CustomerDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_customer_division', 'id_customer_detail_type', 'customer_detail_value'], 'required'],
            [['id_customer', 'id_customer_division', 'customer_detail_value'], 'integer'],
            [['id_customer_detail_type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer_detail' => 'Id Customer Detail',
            'id_customer' => 'Id Customer',
            'id_customer_division' => 'Id Customer Division',
            'id_customer_detail_type' => 'Id Customer Detail Type',
            'customer_detail_value' => 'Customer Detail Value',
        ];
    }
}
