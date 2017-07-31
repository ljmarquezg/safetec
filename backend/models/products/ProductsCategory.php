<?php

namespace backend\models\products;

use Yii;

/**
 * This is the model class for table "products_category".
 *
 * @property integer $id_products_category
 * @property string $products_category_description
 * @property integer $product_category_status
 */
class ProductsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_status'], 'integer'],
            [['products_category_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_products_category' => 'Id Products Category',
            'products_category_description' => 'Products Category Description',
            'product_category_status' => 'Product Category Status',
        ];
    }
}
