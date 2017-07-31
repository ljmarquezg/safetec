<?php

namespace backend\models\products;

use Yii;

/**
 * This is the model class for table "products_brand".
 *
 * @property integer $id_products_brand
 * @property string $products_brand_description
 * @property string $product_brand_status
 */
class ProductsBranch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_products_brand'], 'required'],
            [['id_products_brand'], 'integer'],
            [['products_brand_description', 'product_brand_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_products_brand' => 'Id Products Brand',
            'products_brand_description' => 'Products Brand Description',
            'product_brand_status' => 'Product Brand Status',
        ];
    }
}
