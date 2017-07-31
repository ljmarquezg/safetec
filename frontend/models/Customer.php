<?php

namespace frontend\models\customer;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id_customer
 * @property string $customer_name
 * @property string $customer_address
 * @property string $customer_address2
 * @property string $customer_country
 * @property string $customer_state
 * @property string $customer_zip
 * @property integer $id_customer_status
 * @property string $customer_created
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'id_customer_status', 'customer_created'], 'required'],
            [['id_customer_status'], 'integer'],
            [['customer_created'], 'safe'],
            [['customer_name', 'customer_address', 'customer_address2', 'customer_country', 'customer_state'], 'string', 'max' => 255],
            [['customer_zip'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'customer_name' => 'Customer Name',
            'customer_address' => 'Customer Address',
            'customer_address2' => 'Customer Address2',
            'customer_country' => 'Customer Country',
            'customer_state' => 'Customer State',
            'customer_zip' => 'Customer Zip',
            'id_customer_status' => 'Id Customer Status',
            'customer_created' => 'Customer Created',
        ];
    }
}
