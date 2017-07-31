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
 * @property string $customer_contact
 * @property string $customer_country
 * @property string $customer_state
 * @property string $customer_zip
 * @property string $customer_zone
 * @property string $customer_created
 * @property string $customer_phone
 * @property string $customer_fax
 * @property string $customer_email
 * @property integer $id_customer_status
 * @property string $customer_logo
 * @property integer $customer_status
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
            [['customer_created'], 'safe'],
            [['id_customer_status', 'customer_status'], 'integer'],
            [['customer_logo'], 'string'],
            [['customer_name', 'customer_address', 'customer_address2', 'customer_contact', 'customer_country', 'customer_state', 'customer_zip', 'customer_zone', 'customer_phone', 'customer_fax', 'customer_email'], 'string', 'max' => 255],
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
            'customer_contact' => 'Customer Contact',
            'customer_country' => 'Customer Country',
            'customer_state' => 'Customer State',
            'customer_zip' => 'Customer Zip',
            'customer_zone' => 'Customer Zone',
            'customer_created' => 'Customer Created',
            'customer_phone' => 'Customer Phone',
            'customer_fax' => 'Customer Fax',
            'customer_email' => 'Customer Email',
            'id_customer_status' => 'Id Customer Status',
            'customer_logo' => 'Customer Logo',
            'customer_status' => 'Customer Status',
        ];
    }
}
