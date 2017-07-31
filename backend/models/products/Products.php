<?php

namespace backend\models\products;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id_products
 * @property string $products_description
 * @property integer $id_products_measure_unit
 * @property integer $id_products_brand
 * @property integer $id_product_service
 * @property string $id_products_category
 * @property integer $id_produdcts_status
 * @property integer $retest
 * @property integer $hydrotest
 * @property string $products_capacity
 * @property integer $id_products_chemical
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products'], 'required'],
            [['id_products', 'id_products_measure_unit', 'id_products_brand', 'id_product_service', 'id_produdcts_status', 'retest', 'hydrotest', 'id_products_chemical'], 'integer'],
            [['products_description', 'id_products_category', 'products_capacity'], 'string', 'max' => 255],
            [['products_description'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_products' => 'Id Products',
            'products_description' => 'Products Description',
            'id_products_measure_unit' => 'Id Products Measure Unit',
            'id_products_brand' => 'Id Products Brand',
            'id_product_service' => 'Id Product Service',
            'id_products_category' => 'Id Products Category',
            'id_produdcts_status' => 'Id Produdcts Status',
            'retest' => 'Retest',
            'hydrotest' => 'Hydrotest',
            'products_capacity' => 'Products Capacity',
            'id_products_chemical' => 'Id Products Chemical',
        ];
    }
}
