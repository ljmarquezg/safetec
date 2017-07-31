<?php

namespace backend\models\products;

use Yii;

/**
 * This is the model class for table "products_measureunit".
 *
 * @property integer $id_product_measure_unit
 * @property string $product_measure_unit_description
 */
class ProductsMeasureunit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_measureunit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product_measure_unit'], 'required'],
            [['id_product_measure_unit'], 'integer'],
            [['product_measure_unit_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product_measure_unit' => 'Id Product Measure Unit',
            'product_measure_unit_description' => 'Product Measure Unit Description',
        ];
    }
}
