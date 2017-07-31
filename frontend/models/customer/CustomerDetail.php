<?php

namespace frontend\models\customer;

use Yii;

/**
 * This is the model class for table "customer_detail".
 *
 * @property integer $id_customer_detail
 * @property integer $id_customer
 * @property integer $id_customer_division
 * @property string $id_customer_detail_type
 * @property integer $customer_detail_value
 *
 * @property Customer $idCustomer
 * @property CustomerDivision $idCustomerDivision
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
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'id_customer']],
            [['id_customer_division'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerDivision::className(), 'targetAttribute' => ['id_customer_division' => 'id_customer_division']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomerDivision()
    {
        return $this->hasOne(CustomerDivision::className(), ['id_customer_division' => 'id_customer_division']);
    }
}
