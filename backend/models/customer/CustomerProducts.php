<?php

namespace backend\models\customer;

use Yii;

/**
 * This is the model class for table "customer_products".
 *
 * @property integer $id_customer_product
 * @property integer $id_customer
 * @property integer $id_customer_division
 * @property integer $id_products
 * @property string $serial_number
 * @property integer $id_products_status
 * @property string $last_t_date
 * @property string $retest
 * @property string $hydrotest
 */
class CustomerProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer_product'], 'required'],
            [['id_customer_product', 'id_customer', 'id_customer_division', 'id_products', 'id_products_status'], 'integer'],
            [['last_t_date', 'retest', 'hydrotest'], 'safe'],
            [['serial_number'], 'string', 'max' => 255],
            [['serial_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer_product' => 'Id Customer Product',
            'id_customer' => 'Id Customer',
            'id_customer_division' => 'Id Customer Division',
            'id_products' => 'Id Products',
            'serial_number' => 'Serial Number',
            'id_products_status' => 'Id Products Status',
            'last_t_date' => 'Last T Date',
            'retest' => 'Retest',
            'hydrotest' => 'Hydrotest',
        ];
    }
}
