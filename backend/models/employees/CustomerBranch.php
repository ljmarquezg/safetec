<?php

namespace backend\models\employees;

use Yii;

/**
 * This is the model class for table "customer_branch".
 *
 * @property integer $id_customer_branch
 * @property integer $id_customer
 * @property string $division_name
 * @property string $division_address
 * @property string $division_address2
 * @property string $division_created
 * @property integer $id_customer_status
 *
 * @property Customer $idCustomer
 * @property ContractServices $idCustomerBranch
 */
class CustomerBranch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer'], 'required'],
            [['id_customer', 'id_customer_status'], 'integer'],
            [['division_created'], 'safe'],
            [['division_name', 'division_address', 'division_address2'], 'string', 'max' => 255],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'id_customer']],
            [['id_customer_branch'], 'exist', 'skipOnError' => true, 'targetClass' => ContractServices::className(), 'targetAttribute' => ['id_customer_branch' => 'id_customer_branch']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer_branch' => 'Id Customer Branch',
            'id_customer' => 'Id Customer',
            'division_name' => 'Division Name',
            'division_address' => 'Division Address',
            'division_address2' => 'Division Address2',
            'division_created' => 'Division Created',
            'id_customer_status' => 'Id Customer Status',
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
    public function getIdCustomerBranch()
    {
        return $this->hasOne(ContractServices::className(), ['id_customer_branch' => 'id_customer_branch']);
    }
}
